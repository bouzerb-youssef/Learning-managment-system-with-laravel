<div>
  
                @php
 
                use Vimeo\Laravel\Facades\Vimeo;
 
                $result= Vimeo::request($lesson->video, ['per_page' => 2], 'GET');
                @endphp
                
     
                 @if (isset($lesson)&& $lesson->count()>0)

             
     
              

                  <div  class="plyr__video-embed" id="player">
                    {!!$result['body']['embed']['html']!!}
                  </div>

                              
            @endif
            

          
            @push('scripts')
        {{--     <script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
           <script>
                 
                var player = videojs('player')
                player.on('timeupdate', function() {
                
                   if (this.currentTime() >10)  {
                       this.off('timeupdate')
                       Livewire.emit('VideoViewed')
                      
                       
                   }
                })
                
              

            </script> --}}
         
                
           
        
        @endpush
</div>
