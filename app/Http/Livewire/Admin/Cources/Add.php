<?php

namespace App\Http\Livewire\Admin\Cources;

use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
use App\Jobs\ConvertForStreaming;
use App\Jobs\CreateThumbnailFromVideo;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Cource;
use App\Models\Lesson;
use App\Models\Category;
use App\Models\Material;
use App\Models\whatinthecoure;


class Add extends Component
{

    use WithFileUploads;
  
public $createAccountError;
public $title,$short_description,$desc,$thumbnail,$category_id= [];
 public $cource_id,$section,$description;
 public $vedio,$name,$detail;
 public $materialname,$material;
 public $categories;
 public Lesson $lesson;

   
    public $inputs = [];
    public $i = 0;
 
    public $inputs1 = [];
    public $j = 0;
    public $inputs2 = [];
    public $k = 0;
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
        4 => [
            'heading' => 'الانتهاء',
          
        ],
        5 => [
            'heading' => 'الانتهاء',
          
        ],
    ];
  

    private $validationRules = [
        1 => [
            'title' => ['required', 'min:3'],
            'short_description' => ['required', 'min:3'],
            'desc' => ['required'],
            'thumbnail' => ['required'],
            "category_id"=> ['required'],
        ],
        2 => [
            'materialname' => ['required'],
            'material' => ['required'],
          
        ],
        3 => [
            'detail' => ['required'],
        ],
          
       4 => [
        'name' => ['required'],
        'vedio' => ['required'],
        
    ],
           
    ];


    public function goToNextPage()
    {
        $this->validate($this->validationRules[$this->currentPage]);
        $this->currentPage++;
    }

    public function goToPreviousPage()
    {
        $this->currentPage--;
    }



    public function add2($k)
    {
        $k = $k + 1;
        $this->k = $k;
        array_push($this->inputs2 ,$k);
    }
 
    public function remove2($k)
    {
        unset($this->inputs2[$k]);
    }

    public function add1($j)
    {
        $j = $j + 1;
        $this->j = $j;
        array_push($this->inputs1 ,$j);
    }
 
    public function remove1($j)
    {
        unset($this->inputs1[$j]);
    }




    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->validationRules[$this->currentPage]);
    }

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
    public function  mount($categories){

        $this->categories = $categories;
    } 
    public function categoryID($id)
    {
         $category= Category::where('id', '=',$id)->get();
        return  $category->id ;
    }

 public function store()
     {
       $materials = $this->material;
       $this->detail;
        dd( $this->detail);
       
    DB::beginTransaction();
     try { 
        $rules = collect($this->validationRules)->collapse()->toArray();

        $this->validate($rules);
  
     $thumbnail=$this->thumbnail;
     $img   = ImageManagerStatic::make($this->thumbnail)->resize(367,190)->encode('jpg');
    $name  =$this->thumbnail->getClientOriginalName();
    
     Storage::disk('cources')->put($name, $img);
        $category_id=$this->category_id;      
        $createdCource = Cource::create([
       "title"=> $this->title,
       "short_description"=>$this->short_description,
        "desc"=>$this->desc,
       "thumbnail"=>$name,
       "category_id"=> $category_id[0],
      ]); 
        $names = $this->name; 
        $vedios = $this->vedio;
 
        for($lesson = 0; $lesson < count( $names); $lesson++){
            if($vedios[$lesson]&&  $names[$lesson] ){
            $vedioname=$vedios[$lesson]->getClientOriginalName();
           // Storage::disk('lessons-temp')->put(   $vedios[$lesson]);
           $path = $vedios[$lesson]->store('public/lessons-temp');
            $this->lesson= Lesson::create([
                'name' =>$names[$lesson],
                // 'duration' => $this->duration,
                'video' => explode('/lessons-temp', $path)[1],
                'cource_id' => $createdCource->id,
        
            ]);
        }
          CreateThumbnailFromVideo::dispatch($this->lesson);
          ConvertForStreaming::dispatch($this->lesson);

    }
    $materialnames = $this->materialname; 
   
    $materials = $this->material;
   
    
     for($mati = 0; $mati < count( $materials); $mati++){
         if($materials[$mati]&&  $materialnames[$mati] ){
             
        $name =$materials[$mati]->getClientOriginalName();
        $materialpath=$materials[$mati];
        $storematerial=Storage::disk('materials')->put( $name,  $materialpath);
            Material::create([
                    'materialname' =>$materialnames[$mati],
                    'material' => $name,
                    'cource_id' => $createdCource->id,
                ]);

         }
       
      
   

 }
 
   foreach ($this->detail as $key => $value) {
    whatinthecoure::create([
        'detail' => $this->detail[$key],
        'cource_id' => $createdCource->id,
    ]);
        }   
       DB::commit();

        return redirect()->route('admin.index'); 
    }
    catch (\Exception $e){

/* delete image cource */
        Storage::disk("cources")->delete($this->thumbnail->getClientOriginalName());
/* delete vedio lesson */
        $vedios = $this->vedio;
        for($lesson =0; $lesson < count( $vedios); $lesson++){
           
    //File::deleteDirectory(storage_path('app/public/lessons-temp/'.$vedios[$lesson]->getClientOriginalName()));
        $path =$vedios[$lesson]->store('public/lessons-temp');
         Storage::disk("lessons-temp")->delete(explode('/lessons-temp', $path)[1]);
        } 
    
/*delet material  */
        $materials = $this->material;
        for($mati = 0; $mati < count( $materials); $mati++){
            if($materials[$mati] ){
            $name =$materials[$mati]->getClientOriginalName();
                File::deleteDirectory(storage_path('app/public/materials/'.$name));
        }  }
        /* roollback */

       DB::rollback();
   
       $this->createAccountError= $e->getMessage();
         return redirect()->back()->withErrors(['error' => $e->getMessage()]);

     }  
}
    public function render()
    {
     //$categories= Category::all();
        return view('livewire.admin.cources.add');
    }
}
