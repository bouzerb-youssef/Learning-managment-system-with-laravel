<?php

namespace App\Jobs;

use App\Models\Lesson;
use FFMpeg\Format\Video\X264;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class ConvertForStreaming implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $video;
    public function __construct(Lesson $lesson)
    {
        $this->video= $lesson;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
         $destination = '/'.$this->video->name .'/'.$this->video->name .'.m3u8';
        $low = (new X264('aac'))->setKiloBitrate(500);
        $high = (new X264('aac'))->setKiloBitrate(1000);
    
      $media = FFMpeg::fromDisk('lessons-temp')
            ->open($this->video->video)
            ->exportForHLS()
            ->addFormat($low, function ($filters) {
                $filters->resize(640, 480);
            })
            ->addFormat($high, function ($filters) {
                $filters->resize(1280, 720);
            })
    
            ->toDisk('lessons')
            ->save($destination);

     //  $seconds = $media->getDurationInSeconds(); 
 
           $this->video->update([
                'file_prossesed' => $this->video->name .'.m3u8',
                //'duration' => $this->formatDuration($seconds),
 
    
            ]);
           

       
        //delete temp video
      $result = Storage::disk('lessons-temp')->delete($this->video->video);
     // $result = Storage::disk('lessons-temp')->delete('/'.$this->video->video);

       // Log::info($this->video->path . ' video was deleted from videos-temp folder');  
    } 
 
 
}