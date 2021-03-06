<?php

namespace App\Http\Livewire\Admin\Student;

use Livewire\Component;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Student;
use App\Models\Group;
use App\Models\StudentAttachment;

use Livewire\WithFileUploads;

class Add extends Component
{
    public $createAccountError;
    use WithFileUploads;
    public function goToNextPage()
    {
        $this->validate($this->validationRules[$this->currentPage]);
        $this->currentPage++;
    }

    public function goToPreviousPage()
    {
        $this->currentPage--;
    }


  
    public $inputs = [];
    
    public $i = 0;
 
    public $name,$email,$password,$age,$phone,$sex,$cin,$familySituation,$childrenNmb,$educationLevel,$address,$nots,$photo,$group_id;

    public $genre,$file,$user_id;

    public $groups;
    private $validationRules = [
        1 => [
            'name' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'sex' => 'required',
            'cin' => 'required',
            'familySituation' => 'required',
            'childrenNmb' => 'required',
            'educationLevel' => 'required',
            'address' => 'required',
            'photo' => 'required', 
            'group_id' => 'required',
        ],
        2 => [
            'genre' => ['required'],
            'file' => ['required'],
          
        ],   
    ];

    public function add($i)
    {
        $i = $i + 1;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }
 
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    public function render()
    {
        return view('livewire.admin.student.add');
    }

     public function mount($groups){
         //dd($groups);
        $this->groups=$groups;
    }

    public function storestudent()
    {
        DB::beginTransaction();
    
   
    try {
       $img   = ImageManagerStatic::make($this->photo)/* ->resize(367,190) */->encode('jpg');
        
       // $name  = Str::random() .'photo-student'.'jpg';
       $name  =$this->photo->getClientOriginalName().$this->name;
       
        Storage::disk('student')->put($name, $img); 
        $createdstudent = User::create([
            'name' => $this->name,
            'email' =>  $this->email,
            'password' =>  Hash::make($this->password),
            'age' => $this->age,
            'phone' => $this->phone,
            'sex' =>  $this->sex,
            "cin"=> $this->cin, 
            'familySituation' => $this->familySituation,
            'childrenNmb' =>  $this->childrenNmb,
            'educationLevel' => $this-> educationLevel,
            'address' =>  $this->address,
            "nots"=>$this-> nots,
            "photo"=> $name,
            'group_id' =>$this->group_id,
        ]);
     
       
        /* save studentattachmnet */
        $genres = $this->genre; 
    
        $files= $this->file;
        
   
        for($i = 0; $i < count( $genres); $i++){
          
           //dd( $materials);
      
           $name =$files[$i]->getClientOriginalName()."1111".$this->name;
           
           $materialpath=$files[$i];
           $storematerial=Storage::disk('materials')->put( $name,  $materialpath);
        StudentAttachment::create([
                'genre' =>$genres[$i],
                'file' => $name,
                'user_id' =>$createdstudent ->id,
            ]);
   
    }
    DB::commit();
        toastr()->success('.?????? ???? ??????????????  ??????????');
        return redirect()->route('admin.students'); 
    }
  
    catch (\Exception $e){
        DB::rollback();
        $this->createAccountError= $e->getMessage();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }
}
