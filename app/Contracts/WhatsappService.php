<?php

namespace App\Contracts;

interface WhatsappService
{
    public function sendText(string $phone, string $message): array;

    public function sendDocument(string $phone, string $fileUrl): array;
}