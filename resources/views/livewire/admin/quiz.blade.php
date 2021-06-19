<div>
    <form method="POST" action="{{-- {{route('quiz.result')}} --}}">
                       
        <div class="card mb-3">
            <div class="card-header">{{$cource->title}}</div>

            <div class="card-body">
                @foreach($cource->questions as $question)
                    <div class="card @if(!$loop->last)mb-3 @endif">
                        <div class="card-header">{{ $question->question }}</div>
    
                        <div class="card-body">
                      

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="total_points" id="option-" value="opa" @if($question->opa ==$question->answer) checked @endif >
                                   
                                    <label class="form-check-label" for="option-"style="padding-right: 30px;">
                                        {{ $question->opa }}
                                    </label>
                                    <input class="form-check-input" type="radio" name="total_points" id="option-" value="opb" @if($question->opb ==$question->answer) checked @endif>
                                    <label class="form-check-label" for="option-" style="padding-right: 30px;">
                                        {{ $question->opb }}
                                    </label>
                                    <input class="form-check-input" type="radio" name="total_points" id="option-" value="opc" @if($question->opc ==$question->answer) checked @endif>
                                    <label class="form-check-label" for="option-" style="padding-right: 30px;">
                                        {{ $question->opc }}
                                    </label>
                                    <input class="form-check-input" type="radio" name="total_points" id="option-" value="opd"@if($question->opd ==$question->answer) checked @endif>
                                    <label class="form-check-label" for="option-" style="padding-right: 30px;">
                                        {{ $question->opd }}
                                    </label>
                                </div>
                          

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
                Submit
            </button>
        </div>
    </div>
</form>
</div>
