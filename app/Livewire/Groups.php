<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Group as GroupModel;
use Livewire\WithPagination;

class Groups extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $id;
    public $group_name;
    public $person_name;
    public $phone_number1;
    public $phone_number2;
    public $address;
    public $has_shipping;
    public $category;
    public $search;
    public $evaluation;

    public function render()
    {
        $groups = GroupModel::where('group_name', 'like', "%{$this->search}%")->paginate(10);
        return view('livewire.groups', compact('groups'));
    }

    public function rules()
    {
        return [
            'group_name' => 'required',
            'person_name' => 'required',
            'phone_number1' => 'required|digits:11',
            'phone_number2' => 'nullable|digits:11',
            'address' => 'required',
            'has_shipping' => 'required|in:yes,no',
            'category' => 'required',
            'evaluation' => 'required',
        ];    
    }

    protected function updateRules()
    {
        return [
            'group_name' => 'nullable',
            'person_name' => 'nullable',
            'phone_number1' => 'nullable|digits:11',
            'phone_number2' => 'nullable|digits:11',
            'address' => 'nullable',
            'has_shipping' => 'nullable|in:yes,no',
            'category' => 'nullable',
            'evaluation' => 'nullable',
        ];
    }

    public function updated($fields)
    {
        return $this->validateOnly($fields);
    }

    public function saveGroup(){
        $validateData = $this->validate();
        GroupModel::create($validateData);

        session()->flash('message', 'group created Successfully');
        $this->dispatch('close-modal');
    }

    public function editGroup(int $id)
    {
        $group = GroupModel::find($id);
        if($group){
            $this->id = $group->id;
            $this->group_name = $group->group_name;
            $this->person_name = $group->person_name;
            $this->phone_number1 = $group->phone_number1;
            $this->phone_number2 = $group->phone_number2;
            $this->address = $group->address;
            $this->has_shipping = $group->has_shipping;
            $this->category = $group->category;
            $this->evaluation = $group->evaluation;
        } else {
            return redirect()->back();
        }
    }

    public function updateGroup()
    {
        $validator = $this->validate($this->updateRules());
        $group = GroupModel::find($this->id)->update($validator);
    
        session()->flash('message', 'group updated Successfully');
        $this->dispatch('close-modal');
    }

    public function deleteGroup(int $id)
    {
        $group = GroupModel::find($id);
        if($group){
            $this->id = $group->id;
            $this->group_name = $group->group_name;
        } else {
            return redirect()->back();
        }
    }
    
    public function destroyGroup(){
        $group = GroupModel::find($this->id);
        
        $group->delete();
        session()->flash('delete', 'group deleted Successfully');
        session()->flash('delete', 'group deleted Successfully');
        $this->dispatch('close-modal');
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->group_name = '';
        $this->person_name = '';
        $this->phone_number1 = '';
        $this->phone_number2 = '';
        $this->phone_number2 = '';
        $this->has_shipping = '';
        $this->address = '';
        $this->category = '';
        $this->evaluation = '';
    }
}
