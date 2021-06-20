<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Lesson;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;


class CreateThumbnailFromVideo implements ShouldQueue
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
        $destination = '/'.$this->video->name .'/'.$this->video->name .'.png';
    
       FFMpeg::fromDisk('lessons-temp')
            ->open($this->video->video)
            ->getFrameFromSeconds(2)
            ->export()
            ->toDisk('lessons')
            ->save($destination);
         
       $this->video->update([
            'thumbnail_image' => $this->video->title .'.png',
            
        ]); 
    }
 
}
