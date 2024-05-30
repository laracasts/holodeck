<?php

namespace Laracasts\Holodeck\Services;

use Laracasts\Holodeck\Enums\ImageReplicatorSize;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class Replicator
{
    public function makeImage(string $prompt, ImageReplicatorSize $size): string
    {
        $response = $this
            ->client()
            ->post('https://api.openai.com/v1/images/generations', [
                'model' => 'dall-e-3',
                'n' => 1,
                'response_format' => 'b64_json',
                'prompt' => $prompt,
                'size' => $size->value,
            ])
            ->throw();

        return base64_decode($response->collect('data')->first()['b64_json']);
    }

    private function client(): PendingRequest
    {
        $secret = config('holodeck.services.open-ai.secret');

        if (! $secret) {
            Http::fake([
                'https://api.openai.com/v1/images/generations' => Http::response(file_get_contents(__DIR__.'/../../fixtures/dalle-3-response.json')),
            ]);
        }

        return Http::withToken($secret)->asJson();
    }
}
