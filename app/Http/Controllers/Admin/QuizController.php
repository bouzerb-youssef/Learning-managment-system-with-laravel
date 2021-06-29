<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cource;
use App\Models\Option;
use App\Models\Result;
use App\Models\question;
use App\Http\Requests\StoreTestRequest;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class QuizController extends Controller
{
    public function index($id)
    {
        $cource = Cource::with(['courceQuestions' => function ($query) {
                $query->inRandomOrder()
                    ->with(['questionOptions' => function ($query) {
                        $query->inRandomOrder();
                    }]);
            }])
            ->whereHas('courceQuestions')
            ->find($id);
          

// dd($cource);
      
        return view('quiz', compact('cource'));
    }

    public function store(StoreTestRequest $request)
    {
        $options = Option::find(array_values($request->input('questions')));

        $result = auth()->user()->userResults()->create([
            'total_points' => $options->sum('points')
        ]);

        $questions = $options->mapWithKeys(function ($option) {
            return [$option->question_id => [
                        'option_id' => $option->id,
                        'points' => $option->points
                    ]
                ];
            })->toArray();

        $result->questions()->sync($questions);
        toastr()->success('.لقد تم الاضافة  بنجاح');
        return redirect()->route('quiz.results.show', $result->id);
    }

    public function show($result_id)
    {
        $result = Result::whereHas('user', function ($query) {
                $query->whereId(auth()->id());
            })->findOrFail($result_id);
        
        return view('result', compact('result'));
    }
    public function showquestion($id){
        $cource =Cource::with("courceQuestions")->find($id);
        
        return view ("admin.quiz.showquestion",compact('cource'));

    }

    public function addquestion($id){
        $cource =Cource::find($id);
        
        return view ("admin.quiz.addquestion",compact('cource'));

    }

    public function storequestion(Request $request)
   
    {
       return "iuiu";
     //   try {  
        $request->validate([
            'question' => 'required',
            'audio' => 'required',
            'cource_id' => 'required',
            'option' => 'required',
            'points' => 'required',
            'image' => 'required',
        ]);



        $audio =request('audio');
     
        $name = Str::random().'-'.request('audio')->getClientOriginalName();
       $storeaudio=Storage::disk('questions')->put($name, $audio);
        $createdquestion = Question::create([

          "question"=> request('question'),

           "audio"  =>    $storeaudio ,

          "cource_id"=> request('cource_id'),
          ]);

     
          $options = $request->input('option', []);
          $pointss = $request->input('points', []);
          $images = $request->input('image', []);
       
         // for($i = 0; $i < count( $options); $i++){
              foreach($options as $key->option){
            $image = $request['image']; 
  
            $img   = ImageManagerStatic::make($images[$key])->encode('jpg');
           
            $name  = Str::random() .'options'. $options[$key] .'jpg';
            Storage::disk('options')->put($name, $img);
           $createdoption = Option::create([
    
             "option"=> $options[$key] ,
             "points"=> $pointss[$key] ,
             "image"=>$name   ,
             "question_id"=>  $createdquestion->id,
   
             ]);
         }

        
        
          toastr()->success('.لقد تم الاضافة  بنجاح');
        return redirect()->route('admin.showquestion',request('cource_id'));
   // }
   // catch (\Exception $e){
    //    toastr()->error('هناك خطأ');
     //   return redirect()->back()->withErrors(['error' => $e->getMessage()]);
   // }
    }


    public function remove($id){

     
    
        
          $question = Question::with('questionoptions')->Find($id);

          if( $question){
                 foreach($question->questionOptions as $option){
                    Storage::disk("options")->delete($option->image);
                    $option->delete();
                  }  
                  File::deleteDirectory(storage_path('app/public/questions/'.$question->audio));

                  $question->delete();
          };
        
          toastr()->success('.لقد تم المسح  بنجاح');
     return back()->with('message', '.لقد تم المسح بنجاح ');
  
    }


    public function editquestion($id)
    {
        $cources =Cource::get();
        $question = Question::findorfail($id);
           return view("admin.quiz.editquestion",compact("cources","question"));
          
    }
    

       public function updatequestion($id,Request $request){
     
            /*      $this->validate([

                        'question' => 'required',
                
                        ]);   */
                
           $updatequestion = question::findorfail($id)->update([
           
               "question"=>$request['question'],
               "cource_id"=>$request['cource_id'],
               ]);
               toastr()->success('.لقد تم التعديل  بنجاح');
           return redirect()->route('admin.showquestion',$request['cource_id'])->with('message', '.لقد تم التعديل بنجاح ');
          
       }
    

/*        public function showoption($id){
        $cource =Cource::with("courceQuestions")->find($id);
        
        return view ("admin.quiz.showquestion",compact('cource'));

    } */

    public function addoption($id){
      
        $question =Question::with('questionOptions')->findorfail($id);
        return view ("admin.quiz.addoption",compact('question'));

    }
  
   
    public function storeoption(Request $request)
   
    {
      
        $request->validate([
            'option' => 'required',
    
            'points' => 'required',
            'image' => 'required',
          
          
 
        ]);

         $image = $request['image']; 
  
         $img   = ImageManagerStatic::make($request->image)->encode('jpg');
        
         $name  = Str::random() .'options'.request('option').'jpg';
         Storage::disk('options')->put($name, $img);
        $createdoption = Option::create([
 
          "option"=> request('option'),
          "points"=> request('points'),
          "image"=>$name   ,
          "question_id"=> request('question_id'),

          ]);
          $createdoption->save();
          toastr()->success('.لقد تم الاضافة  بنجاح');
        return redirect()->back()->with('message', '.لقد تم اضافة الخيار بنجاح ');

    }

    public function removeoption($id){

        $option = Option::Find($id);
      
        $option->delete();
        toastr()->success('.لقد تم المسح  بنجاح');
     return back()->with('message', '.لقد تم المسح بنجاح ');;
  
    }


    public function editoption($id){
        $question =Option::with('question')->find($id)->question->id;
       
    
        $option = Option::findorfail($id);
           return view("admin.quiz.editoption",compact("option","question"));
          
       }
    

       public function updateoption($id,Request $request){
     
  /*      $this->validate([
               'question' => 'required',
             ]);   */
     
           $updateoption = Option::findorfail($id)->update([
           
               "option"=>$request['option'],
               "points"=>$request['points'],
               "question_id"=>$request['question_id'],
               ]);
               toastr()->success('.لقد تم التعديل  بنجاح');
           return redirect()->route('admin.addoption',$request['question_id'])->with('message', '.لقد تم التعديل بنجاح ');
          
       }
}
