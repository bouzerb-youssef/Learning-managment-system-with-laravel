<?php

namespace App\Http\Livewire\Admin\Lesson;
 use App\Jobs\ConvertForStreaming;
 use App\Jobs\CreateThumbnailFromVideo;
 use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use App\Models\Section;
use App\Models\Lesson;
use Livewire\WithFileUploads;

class Addlesson extends Component
{
    use WithFileUploads;

    public $section_id;
    public Section $section;
    public Lesson $lesson;
    public $title;
    public $duration;
    public $vedio;
    
    protected $rules = [
        'vedio' => 'required|mimes:mp4|max:12288000'
    ];

    public function mount(Section $section){

      $this->section=$section;

    }

    public function fileCompleted()
    {
         // validation

        
        $this->validate([
            'title' => 'required|max:70',
            //'duration' => 'required|integer',
            'vedio' => 'required',
          ]); 
        //save the file
        $path = $this->vedio->store('public/lessons-temp');

        //create video record in sb
        $this->lesson = $this->section->lessons()->create([
            'title' =>$this->title,
           // 'duration' => $this->duration,
            'video' => explode('/lessons-temp', $path)[1]
           
        ]);
//dispatch jobs
       CreateThumbnailFromVideo::dispatch($this->lesson);
    ConvertForStreaming::dispatch($this->lesson);
 
     $cource_id=section::with("cource")->find($this->section->id);
  
        
        //redirect to edit route
        toastr()->success('.لقد تم الانشاء  بنجاح');

        return redirect()->route("admin.sections",$cource_id->cource->id);
   
       
    }

   

    public function remove($id){

      $lesson = Lesson::Find($id);
        if($lesson){
        
            Storage::deleteDirectory("app/public/lessons/".$lesson->title);
            $lesson->delete();
        }
        toastr()->error('.لقد تم المسح  بنجاح');

     }

    public function render()
    {
        $section =Section::find($this->section_id);
        return view('livewire.admin.lesson.addlesson',compact("section"));
    }
}
