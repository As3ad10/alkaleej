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
        $phone = $this->normalizePhone($phone);

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
        $phone = $this->normalizePhone($phone);

        $response = Http::post($this->endpoint, [
            'recipient' => $phone,
            'apikey'    => $this->apiKey,
            'document'  => $fileUrl,
        ]);

        return [
            'success'     => $response->successful(),
            'status_code' => $response->status(),
            'body'        => $response->body(),
        ];
    }

    /**
     * Normalize Saudi phone numbers to international format suitable for WhatsApp.
     *
     * Expected input from form: 05XXXXXXXX (10 digits).
     * Output: 9665XXXXXXXX (no plus sign).
     */
    protected function normalizePhone(string $phone): string
    {
        // Keep digits only
        $digits = preg_replace('/\D+/', '', $phone ?? '');

        if (! $digits) {
            return $phone;
        }

        // If already starts with 00966, convert to 966
        if (str_starts_with($digits, '00966')) {
            $digits = '966' . substr($digits, 5);
        }

        // If already in 966 format, return as-is
        if (str_starts_with($digits, '966')) {
            return $digits;
        }

        // From local 05XXXXXXXX -> 9665XXXXXXXX
        if (strlen($digits) === 10 && str_starts_with($digits, '05')) {
            return '966' . substr($digits, 1);
        }

        // From 5XXXXXXXX (missing leading 0) -> 9665XXXXXXXX
        if (strlen($digits) === 9 && str_starts_with($digits, '5')) {
            return '966' . $digits;
        }

        // Fallback: return digits-only version
        return $digits;
    }
}