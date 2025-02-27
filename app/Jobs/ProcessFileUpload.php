<?php

namespace App\Jobs;

use App\Models\PostFile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProcessFileUpload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    protected $post;
    protected $files;

    public function __construct(Post $post,array $files)
    {
        $this->post = $post;
        $this->files = $files;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->files as $filePath) {
            // Define the final folder
            $finalFolder = 'uploads/' . date('Y/m/d'); // Example: uploads/2023/10/05

            // Move the file to the final folder
            $fileName = basename($filePath);
            $newFilePath = $finalFolder . '/' . $fileName;

            // Ensure the final folder exists
            Storage::disk('public')->makeDirectory($finalFolder);

            // Move the file
            Storage::disk('public')->move($filePath, $newFilePath);



            }


    }
}
