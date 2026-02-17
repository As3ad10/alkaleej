<?php

namespace App\Services;

use App\Contracts\WhatsappService;
use Illuminate\Support\Facades\Http;

class TextMeBotWhatsappService implements WhatsappService
{
    protected string $apiKey;
    protected string $endpoint;

    public function __construct()
    {
        $this->apiKey = config('services.textmebot.apikey');
        $this->endpoint = config('services.textmebot.base_url');
    }

    public function sendText(string $phone, string $message): array
    {
        $response = Http::post($this->endpoint, [
            'recipient' => $phone,
            'apikey'    => $this->apiKey,
            'text'      => $message,
        ]);

        return [
            'success'     => $response->successful(),
            'status_code' => $response->status(),
            'body'        => $response->body(),
        ];
    }

    public function sendDocument(string $phone, string $fileUrl): array
    {
        $response = Http::post($this->endpoint, [
            'recipient' => $phone,
            'apikey'    => $this->apiKey,
            'file'      => $fileUrl,
        ]);

        return [
            'success'     => $response->successful(),
            'status_code' => $response->status(),
            'body'        => $response->body(),
        ];
    }
}
