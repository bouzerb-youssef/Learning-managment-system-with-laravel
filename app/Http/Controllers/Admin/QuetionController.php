<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Cource;
use Illuminate\Support\Facades\Session;

class QuetionController extends Controller
{
    public function addquestion(Request $request){
        $request->validate([
            'question' => 'required',
            'opa' => 'required',
            'opb' => 'required',
            'opc' => 'required', 
            'opd' => 'required', 
            'answer' => 'required',
            'cource_id' => 'required',
        ]);
        $createdquestion = Question::create([
 
          "question"=> request('question'),
          "opa"=>request('opa'),
          "opb"=>request('opb'),
          "opc"=>request('opc'),
          "opd"=> request('opd'),
          "answer"=> request('answer'),
          "cource_id"=>request('cource_id'),
          ]);

          $createdquestion->save();
//dd($createdquestion);
       
        return redirect()->back();

    }

    public function showquestion(){
        $questions = Cource::find($cource->id)->with('questions');



    }

    public function takequiz($id){
        $cource = Cource::with('questions')->find($id);
           
        return view('quiz',compact('cource'));
    }


    public function startquiz(){
        session::put("nextq",1);
        session::put("worongans",0);
        session::put("correctans",0);
    
        $cource =Cource::with('questions')->find(4);
        $col=collect($cource)->each(function($question){
            $question->first();
        });
        //dd($col);
       
        return view('quizdesk',compact('cource'));
    }
}
