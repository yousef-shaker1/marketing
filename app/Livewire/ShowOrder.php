<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order as OrderModel;

class ShowOrder extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $id;
    public $name;
    public $phone1;
    public $phone2;
    public $province;
    public $address;
    public $amount;
    public $status;
    public $product_id;
    public $search;

    public function render()
    {
        $products = Product::all();
        $orders = OrderModel::whereHas('product', function ($query) {
            $query->where('group_id', $this->id); // الفلترة باستخدام group_id من المنتج
        })
        ->where('name', 'like', "%{$this->search}%")
        ->paginate(10);
                return view('livewire.show-order', compact('orders', 'products'));
    }

    public function mount($id = null)
    {
        $this->id = $id;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'phone1' => 'required|digits:11',
            'phone2' => 'required|digits:11',
            'province' => 'nullable',
            'address' => 'required',
            'amount' => 'required',
            'status' => 'required',
            'product_id' => 'required|exists:products,id',
        ];    
    }

    protected function updateRules()
    {
        return [
            'name' => 'nullable',
            'phone1' => 'nullable|digits:11',
            'phone2' => 'nullable|digits:11',
            'province' => 'nullable',
            'address' => 'nullable',
            'amount' => 'nullable',
            'status' => 'nullable',
            'product_id' => 'nullable|exists:products,id',
        ];
    }

    public function updated($fields)
    {
        return $this->validateOnly($fields);
    }

    public function saveOrder(){
        $validateData = $this->validate();
        OrderModel::create($validateData);

        session()->flash('message', 'Order created Successfully');
        $this->dispatch('close-modal');
    }

    public function editOrder(int $id)
    {
        $order = OrderModel::find($id);
        if($order){
            $this->id = $order->id;
            $this->name = $order->name;
            $this->phone1 = $order->phone1;
            $this->phone2 = $order->phone2;
            $this->province = $order->province;
            $this->address = $order->address;
            $this->amount = $order->amount;
            $this->status = $order->status;
            $this->product_id = $order->product_id;
        } else {
            return redirect()->back();
        }
    }

    public function OK_Status($id){
        $order = OrderModel::find($id);
        $order->status = 'تمت بنجاح';
        $order->save();
    }
    public function Hanging_Status($id){
        $order = OrderModel::find($id);
        $order->status = 'معلق';
        $order->save();
    }
    public function Reject_Status($id){
        $order = OrderModel::find($id);
        $order->status = 'رفض';
        $order->save();
    }
    public function Delayed_Status($id){
        $order = OrderModel::find($id);
        $order->status = 'مؤجل';
        $order->save();
    }
    public function Under_review_Status($id){
        $order = OrderModel::find($id);
        $order->status = 'قيد المراجعة';
        $order->save();
    }

    public function updateOrder()
    {
        $validator = $this->validate($this->updateRules());
        $order = OrderModel::find($this->id)->update($validator);
    
        session()->flash('message', 'order updated Successfully');
        $this->dispatch('close-modal');
    }

    public function deleteOrder(int $id)
    {
        $order = OrderModel::find($id);
        if($order){
            $this->id = $order->id;
            $this->name = $order->name;
        } else {
            return redirect()->back();
        }
    }
    
    public function destroyOrder(){
        $order = OrderModel::find($this->id);
        
        $order->delete();
        session()->flash('delete', 'order deleted Successfully');
        $this->dispatch('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->name = '';
        $this->phone1 = '';
        $this->phone2 = '';
        $this->province = '';
        $this->address = '';
        $this->amount = '';
        $this->status = '';
        $this->product_id = '';
        
    }
}
