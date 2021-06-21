<div>
     
                 @if (isset($lesson)&& $lesson->count()>0)
                  
                        
                   <video 
                        wire:ignore
                        width="500"
                        height="auto"
                            playsinline="playsinline"
                            id="player"
                             class="video-js video-js vjs-fluid vjs-default-skin vjs-theme-forest"  
                            controls
                           preload="auto" 
                            poster="{{asset('storage/lessons/'.$lesson->name .'/'.$lesson->thumbnail_image)}} "
                            data-setup='{}'
                            
                             >
                        
                               
                                    <source src="{{asset('storage/lessons/'.$lesson->name .'/'.$lesson->file_prossesed)}}"  type='application/x-mpegURL' >
                                    <source src="{{asset('storage/lessons/'.$lesson->name .'/'.$lesson->file_prossesed)}}"  type='application/x-mpegURL' >
                            
                                <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a
                                    web browser that
                                    <a href="https://videojs.com/html5-video-support/" target="_blank">
                                    supports HTML5 video
                                    </a>
                                </p>
                        </video> 
                      
               
                              
                        @endif
            

          
            @push('scripts')
            <script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
           <script>
                 
                var player = videojs('player')
                player.on('timeupdate', function() {
                
                   if (this.currentTime() >10)  {
                       this.off('timeupdate')
                       Livewire.emit('VideoViewed')
                      
                       
                   }
                })
               
            </script>
         
                
           
        
        @endpush
</div>
