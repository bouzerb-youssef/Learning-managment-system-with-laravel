<?php

namespace App\Http\Livewire\Admin\Lesson;
 use App\Jobs\ConvertForStreaming;
 use App\Jobs\CreateThumbnailFromVideo;
 use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use App\Models\cource;
use App\Models\Lesson;
use Livewire\WithFileUploads;
use Vimeo\Laravel\VimeoManager;
class Addlesson extends Component
{
    use WithFileUploads;
    protected $vimeo;

    public $cource_id;
    public  $cources;
    public Lesson $lesson;
    public $name;
    //public $duration;
    public $video;
   
    protected $rules = [
        'vedio' => 'required|mimes:mp4|max:12288000'
    ];

    public function mount($cources ){

      $this->cources=$cources;
     // $this->vimeo = $vimeo;

    }

    public function fileCompleted( VimeoManager $vimeo)
    {
         // validation

       // dd($this->video);
        $this->validate([
            'name' => 'required|max:70',
            
            'video' => 'required',
          ]); 
        //save the file
        //dd($vimeo);
        $video= $vimeo->upload($this->video,[
            'title'=>$this->name,
        ]);
 dd($video);
        $createdCource = Lesson::create([
  
          "name"=> this->name,
          "video"=> $video,
       
          "cource_id"=> $this->cource_id,
         ]); 
        toastr()->success('.لقد تم الانشاء  بنجاح');

        return redirect()->route("admin.lessons");
   
       
    }

   

    public function remove($id){

      $lesson = Lesson::Find($id);
        if($lesson){
        
            Storage::deleteDirectory("app/public/lessons/".$lesson->name);
            $lesson->delete();
        }
        toastr()->error('.لقد تم المسح  بنجاح');

     }

    public function render()
    {
        $cource =cource::find($this->cource_id);
        return view('livewire.admin.lesson.addlesson',compact("cource"));
    }
}
