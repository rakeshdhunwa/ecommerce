<?php

namespace App\Http\Livewire;
use App\Models\Students;
use Livewire\Component;
use Livewire\WithFileUploads;


class Student extends Component
{

    use WithFileUploads;

    public $action;
    public $list;
    public $creates;
    public $edit;
    public $update;
    public $delete;
    public $name;
    public $email;
    public $class;
    public $rollnumber;
    public $gender;
    public $image;
    public $dob;
    public $dataId;

    public function render()
    {
       $students = Students::all();
        return view('livewire.student',compact('students'));
    }

    public function mount(){
        $this->action ='list';
    }
    public function create(){
        $this->action ='creates';
    }

    public function store($id = ''){
        // dd('test');
        $data = [
           'name' => $this-> name, 
           'email' => $this-> email, 
           'class' => $this-> class, 
           'rollnumber' => $this-> rollnumber, 
           'gender' => $this-> gender, 
           'image' => $this-> image->store('000'), 
           'dob' => $this-> dob, 
           
        ];
        if($id){
            Students::where('id', $id)->update($data);
        }else{
            Students::create($data);
        }
        $this->reset();
        $this->action ='list';
    }
    public function edit($id){
        $data = Students::where('id', $id)->first();

        $this->name = $data->name;
        $this->email = $data->email;
        $this->class = $data->class;
        $this->rollnumber = $data->rollnumber;
        $this->gender = $data->gender;
        $this->image = $data->image;
        $this->dob = $data->dob;
        $this->action ='creates';
        $this->dataId = $data->id;
    }


    public function delete($id){
        Students::where('id', $id)->delete();
        $this->action ='list';
    }
    
}
