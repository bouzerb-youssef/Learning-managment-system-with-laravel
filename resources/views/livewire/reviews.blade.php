<div>
     <!-- course Reviews-->
  <br><br><br>

        <div class="comments">
            <h4 style="background: #3659a2;
            padding: 10px;
            color: #FFF;
            border-radius: 10px 10px 0px 0px;">التعليقات : <span class="comments-amount">{{$numberofreview}} </span> </h4>

            <ul style="padding-right: 0;">
                @foreach ($comments as $comment)
                    
               
                <li style="background: white;
                padding: 18px;
                border-radius: 10px;">
                    <div class="comments-avatar"><img src="{{$comment->user->profile_photo_url }}" alt="">
                    </div>
                    <div class="comment-content">
                        <div class="comment-by">{{$comment->user->name}}<span>Student</span>
                            <div style='padding: 21px;' class="comment-stars">
                                <div class="star-rating">{{$comment->created_at->diffforHumans()}}</div>
                            </div>
                        </div>
                        <p class='responsive'>{{$comment->review}}
                        </p>
                        
                    </div>

                </li>
                @endforeach

            </ul>

        </div>
        <div >
            @error('review') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            
        </div>
        <div style="background: white;
        padding: 10px;
        border-radius: 10px;" class="comments">
            <h3>انشاء تعليق  </h3>
            <ul>
                <li>
                    <div class="comments-avatar"><img src="../assets/images/avatars/avatar-2.jpg" alt="">
                    </div>
                    <div style="padding-right: 0;" class="comment-content">
                        <form  wire:submit.prevent='addComment' class="uk-grid-small uk-grid" uk-grid="">
                            <div class="uk-width-1-2@s uk-first-column">
                                <label class="uk-form-label">الاسم</label>
                                @php
                                use Illuminate\Support\Facades\Auth;
                             @endphp 
                             <input class="uk-input" type="text"    @auth  value="({{Auth::user()->name}})" @endauth }>
                            </div>
                            <div class="uk-width-1-1@s uk-grid-margin uk-first-column">
                                <label  class="uk-form-label">التعليق</label>
                                <textarea class="uk-textarea" wire:model.lazy='review' placeholder="أكتب تعليقك هنا ....." style=" height:160px"></textarea>
                           
                            
                                    <div class="uk-grid-margin uk-first-column">
                                        <input style="width: 28%;" type="submit" value="حفظ" class="btn btn-dark">
                                    </div>
                               
                            </div>
                           
                          
                        </form>

                    </div>
                </li>
            </ul>
        </div>






</div>
