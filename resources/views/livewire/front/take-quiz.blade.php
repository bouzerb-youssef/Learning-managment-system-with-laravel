<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
               
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
                                 
                                 
                                        @foreach($cource->courceQuestions as$question)
                                      
                                            <div class=" @if(!$loop->last)mb-3 @endif">
                                                @if (!$question->questionOptions->count()==0)
                                                <div class="card-header">
                                                    <div >
    
                                                        <h6>- {{ $question->question }} :</h6>
                                                
                                                        <div style="width: 100%;margin-top: 10px;">
                                                            <audio style="width: 100%"  controls src="{{asset('storage/questions/'.$question->audio)}}" type="audio/mp3" ></audio>
                                                
                                                        </div>
                                                    </div>
                                                    
                                                </span>
                                               
                                                <div class="card-body">
                                                    <input type="hidden" name="questions[{{ $question->id }}]" value="">
                                                    <div class="row">
                                                    @foreach($question->questionOptions as $option)
                                                 
                                                        <div class="col-md-3">
                                                            
                                                                <input class="form-check-input" type="radio" name="questions[{{ $question->id }}]" id="option-{{ $option->id }}" value="{{ $option->id }}"@if(old("questions.$question->id") == $option->id) checked @endif >
                                                                <label class="form-check-label" for="option-{{ $option->id }}">
                                                                    
                                                                   <img style="
                                                                   border-radius: 10px;margin-bottom:10px;" src="{{ $option->imagePath }}" alt=""> 
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
                         {{--            @if ($currentPage === $key)
                                    @elseif ($currentPage === 2)
                                    @endif
                                    <div class="d-flex justify-content-between mb-3 px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        @if ($currentPage === 1)
                                            <div></div>
                                        @else
                                            <button wire:click="goToPreviousPage" type="button" class="btn btn-outline-warning"  >
                                                الرجوع
                                            </button>
                                        @endif
                                        @if ($currentPage === count($pages))
                                      
                                     
                                            <button type="submit"   class='btn btn-outline-dark'   >
                                                حفظ
                                            </button>
                                        @else
                                        
                                            <button wire:click="goToNextPage" type="button" class="btn btn-outline-success" >
                                                التالي
                                            </button>
                                    
                                    </div> --}}
                            <div class="form-group row mb-0">
                                <div class="col-md-6">
                                    <button style="margin: 10px 10px;" type="submit" class="btn btn-primary">
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
