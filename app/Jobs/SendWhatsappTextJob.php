<?php

namespace App\Jobs;

use App\Contracts\WhatsappService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendWhatsappTextJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public int $timeout = 20;

    protected string $phone;
    protected string $message;

    public function __construct(string $phone, string $message)
    {
        $this->phone = $phone;
        $this->message = $message;

        $this->onQueue('default');
        $this->delay(now()->addSeconds(rand(5, 15)));
    }

    /**
     * Execute the job.
     */
    public function handle(WhatsappService $whatsapp): void
    {
        $sent = $whatsapp->sendText($this->phone, $this->message);

        if (! $sent['success']) {
            throw new \Exception('WhatsApp sending failed: ' . $sent['body'], $sent['status_code']);
        } else {
            Log::info('whatsapp sent successfully: ' . $sent['body']);
        }
    }
}