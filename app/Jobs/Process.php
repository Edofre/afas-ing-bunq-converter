<?php

namespace App\Jobs;

use App\Csv\Imports\TransactionsImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class Process
 * @package App\Jobs
 */
class Process implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /** @var string */
    private $path;

    /**
     * Create a new job instance.
     * @param string $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Import the excel as a collection
        \Excel::import(new TransactionsImport($this->path), $this->path);

        // Delete the file because we don't need it anymore
        \Storage::delete($this->path);
    }
}
