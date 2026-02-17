<?php

namespace App\Jobs;

use Throwable;
use Illuminate\Bus\Queueable;
use App\Contracts\WhatsappService;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendWhatsappDocumentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public int $timeout = 20;

    protected string $phone;
    protected string $fileUrl;

    public function __construct(string $phone, string $fileUrl)
    {
        $this->phone = $phone;
        $this->fileUrl = $fileUrl;
        $this->onQueue('default');
        $this->delay(now()->addSeconds(rand(5, 15)));
    }

    public function handle(WhatsappService $whatsapp): void
    {
        $sent = $whatsapp->sendDocument(
            $this->phone,
            $this->fileUrl
        );

        if (! $sent['success']) {
            throw new \Exception('WhatsApp sending failed: ' . $sent['body'], $sent['status_code']);
        }
    }

    public function failed(Throwable $exception): void
    {
        // Optional: log or notify admin
        Log::error('WhatsApp Job Failed', [
            'phone' => $this->phone,
            'error' => $exception->getMessage(),
        ]);
    }
}
