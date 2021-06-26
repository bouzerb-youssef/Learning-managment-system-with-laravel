@extends('front.layouts.app')

@section('content')
<br><br><br><br>
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">هذا الاختبار يختبرك في مكتسباتك من هذا الكورس</div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{  route('quiz.store')  }}">
                        @csrf
                       
                            <div class="card mb-3">
                                <div class="card-header">{{ $cource->title }}</div>
                
                                <div class="card-body">
                                    @foreach($cource->courceQuestions as $question)
                                        <div class="card @if(!$loop->last)mb-3 @endif">
                                            @if (!$question->questionOptions->count()==0)
                                            <div class="card-header">
                                                <div class="d-flex justify-content-between mb-3">

                                                    <h6>- {{ $question->question }} :</h6>
                                            
                                                    <div>
                                                        <audio style="padding-right: 50px;"  controls src="{{asset('storage/questions/'.$question->audio)}}" type="audio/mp3" ></audio>
                                            
                                                    </div>
                                                </div>
                                                
                                            </span>
                                           
                                            <div class="card-body">
                                                <input type="hidden" name="questions[{{ $question->id }}]" value="">
                                                <div class="row">
                                                @foreach($question->questionOptions as $option)
                                             
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="questions[{{ $question->id }}]" id="option-{{ $option->id }}" value="{{ $option->id }}"@if(old("questions.$question->id") == $option->id) checked @endif >
                                                        <label class="form-check-label" for="option-{{ $option->id }}" style="padding-right: 30px;">
                                                            
                                                           <img src="{{ $option->imagePath }}" alt=""> 
                                                        </label>
                                                    </div>
                                                
                                                @endforeach
                                            </div>
                                            @endif

                                                @if($errors->has("questions.$question->id"))
                                                    <span style="margin-top: .25rem; font-size: 80%; color: #e3342f;" role="alert">
                                                        <strong>{{ $errors->first("questions.$question->id") }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    حفظ الاختبار
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
