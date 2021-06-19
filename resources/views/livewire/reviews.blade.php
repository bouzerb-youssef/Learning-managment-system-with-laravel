<div>
     <!-- course Reviews-->
  <br><br><br>

        <div class="comments">
            <h4>التعليقات : <span class="comments-amount">{{$numberofreview}} </span> </h4>

            <ul>
                @foreach ($comments as $comment)
                    
               
                <li>
                    <div class="comments-avatar"><img src="{{$comment->user->profile_photo_url }}" alt="">
                    </div>
                    <div class="comment-content">
                        <div class="comment-by">{{$comment->user->name}}<span>Student</span>
                            <div class="comment-stars">
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
            <div>
                @if (session()->has('message'))
                <div class="p-3 bg-green-300 text-green-800 rounded shadow-sm">
                    {{ session('message') }}
                </div>
                @endif
            </div>
        </div>
        <div class="comments">
            <h3>انشاء تعليق  </h3>
            <ul>
                <li>
                    <div class="comments-avatar"><img src="../assets/images/avatars/avatar-2.jpg" alt="">
                    </div>
                    <div class="comment-content">
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
                                <textarea class="uk-textarea" wire:model.lazy='review' placeholder="Enter Your Comments her..." style=" height:160px"></textarea>
                            </div>
                            <div class="uk-grid-margin uk-first-column">
                                <input type="submit" value="submit" class="btn btn-default">
                            </div>
                        </form>

                    </div>
                </li>
            </ul>
        </div>






</div>
