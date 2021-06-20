<?php

namespace App\Http\Livewire\Admin\Student;

use Livewire\Component;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Student;
use App\Models\Group;
use Livewire\WithFileUploads;

class Add extends Component
{

    use WithFileUploads;
    public $currentPage = 1;

    public $pages = [
        1 => [
            'heading' => 'معلومات التلميد',
            
        ],
        2 => [
            'heading' => 'الوثائق',
           
        ],
        3 => [
            'heading' => 'الانتهاء',
          
        ],
    ];


    public function goToNextPage()
    {
        //$this->validate($this->validationRules[$this->currentPage]);
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
/*     $request->validate([
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
    ]); */
   
    try {
       // $img   = ImageManagerStatic::make($this->photo)/* ->resize(367,190) */->encode('jpg');
        
        //$name  = Str::random() .'photo-student'.'jpg';
    /*     $name  =$this->photo->getClientOriginalName().$this->name;
        dd( $name);
        Storage::disk('student')->put($name, $img); 
        $createdstudent = User::create([
            'name' => $this->name,
            'email' =>  $this->email,
            'password' =>  Hash::$this->password,
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
     */
       
        /* save studentattachmnet */
        $genres = $this->genre; 
     
        $files = $this->file;
 
   
        for($i = 1; $i < count( $genres)+1; $i++){
          
           //dd( $materials);
      $this->name ="ujhuihyui";
           $name =$files[$i]->getClientOriginalName();
           dd( $name.":<:student:>:".$this->name);
           $materialpath=$files[$i];
           $storematerial=Storage::disk('materials')->put( $name,  $materialpath);
        Material::create([
                'genre' =>$materialnames[$i],
                'file' => $name,
                'user_id' =>$createdstudent ->id,
            ]);
   
    }
        toastr()->success('.لقد تم الاضافة  بنجاح');
        return redirect()->route('admin.students'); 
    }
  
    catch (\Exception $e){
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
    }
}
