<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ScrappJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $payload;
    public $timeout = 30000;

    /**
     * Create a new job instance.
     *
     * @param array $payload
     */
    public function __construct(array $payload)
    {
        $this->payload = $payload;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // You can access the payload data within the job like this:
        // $name = $this->payload['name'];
        // $configurations = $this->payload['configurations'];

        // Perform your job logic here using the data from the payload
        // For example, you can make the HTTP request and process the response here
        try {
            // Increase the timeout for this specific HTTP request
            $response = Http::timeout(30000)->post('http://localhost:3000/scrape/provider', $this->payload);

            // Log the payload and response data
            Log::info('Payload:', $this->payload);
            Log::info('Response:', $response->json());
        } catch (\Exception $e) {
            // Handle exceptions (e.g., connection errors, timeouts) here
            Log::info($e);
        }
    }
}
