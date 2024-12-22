<?php

namespace App\Livewire;

use App\Models\Group;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Product as ProductModel;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;
class Products extends Component
{
    use WithPagination ,WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $id;
    public $name;
    public $img;
    public $description;
    public $price;
    public $search = '';
    public $gain;
    public $category;
    public $has_shipping;
    public $group_id;
    

    public function render()
    {
        $groups = Group::get();
        $products = ProductModel::where('name', 'like', "%{$this->search}%")
        ->orWhere(function ($query) {
            $query->whereHas('group', function ($query) {
                $query->where('group_name', 'like', "%{$this->search}%");
            });
        })
        ->paginate(10);
        return view('livewire.products', compact('groups','products'));
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'img' => 'required|image',
            'description' => 'required',
            'price' => 'required',
            'gain' => 'required',
            'category' => 'required',
            'has_shipping' => 'required|in:yes,no',
            'group_id' => 'required|exists:groups,id',
        ];    
    }

    protected function updateRules()
    {
        return [
            'name' => 'nullable',
            'img' => 'nullable',
            'description' => 'nullable',
            'price' => 'nullable',
            'gain' => 'nullable',
            'category' => 'nullable',
            'has_shipping' => 'nullable|in:yes,no',
            'group_id' => 'nullable|exists:groups,id',
        ];    
    }

    public function updated($fields)
    {
        return $this->validateOnly($fields);
    }

    public function saveProduct(){
        $validateData = $this->validate();
        $path = $this->img->store('product', 'public');
        $validateData['img'] = $path;
        ProductModel::create($validateData);

        session()->flash('message', 'product created Successfully');
        $this->dispatch('close-modal');
    }

    public function editProduct(int $id)
    {
        $product = ProductModel::find($id);
        if($product){
            $this->id = $product->id;
            $this->name = $product->name;
            $this->img = $product->img;
            $this->description = $product->description;
            $this->price = $product->price;
            $this->gain = $product->gain;
            $this->category = $product->category;
            $this->has_shipping = $product->has_shipping;
            $this->group_id = $product->group_id;
        } else {
            return redirect()->back();
        }
    }

    public function updateProduct()
    {
        $validator = $this->validate($this->updateRules());
        $product = ProductModel::find($this->id);
        if ($this->img instanceof UploadedFile) {
            // Delete the old image if it exists
            if (!empty($product->img) && Storage::disk('public')->exists($product->img)) {
                Storage::disk('public')->delete($product->img);
            }
    
            // Store the new image
            $path = $this->img->store('product', 'public');
            $product->img = $path;
        }
        
        // Update section name
        $product->name = $validator['name'];
        $product->description = $validator["description"];
        $product->price = $validator["price"];
        $product->gain = $validator["gain"];
        $product->category = $validator["category"];
        $product->has_shipping = $validator["has_shipping"];
        $product->group_id = $validator["group_id"];

    
        $product->save();
        session()->flash('message', 'product updated Successfully');
        $this->dispatch('close-modal');
    }

    public function deleteProduct(int $id)
    {
        $product = ProductModel::find($id);
        if($product){
            $this->id = $product->id;
            $this->name = $product->name;
        } else {
            return redirect()->back();
        }
    }
    
    public function destroyProduct(){
        $product = ProductModel::find($this->id);
        if (!empty($product->img) && Storage::disk('public')->exists($product->img)) {
            Storage::disk('public')->delete($product->img);
        }
        $product->delete();
        session()->flash('delete', 'group deleted Successfully');
        $this->dispatch('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->name = '';
        $this->img = '';
        $this->description = '';
        $this->price = '';
        $this->gain = '';
        $this->category = '';
        $this->has_shipping = '';
        $this->group_id = '';
    }
}
