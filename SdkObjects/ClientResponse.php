<?php
/*
 * Encore Digital Group - Planning Center PHP SDK
 * Copyright (c) 2023-2024. Encore Digital Group
 */

namespace EncoreDigitalGroup\SdkClientFoundation\SdkObjects;

use EncoreDigitalGroup\SdkClientFoundation\HttpStatusCode;

class ClientResponse
{
    public SdkContainer $sdk;
    public object $service;

    public function __construct(mixed $clientResponse)
    {

        $responseBody = $clientResponse->getBody()->getContents();
        $httpStatusCode = $clientResponse->getStatusCode();
        $httpMessage = $clientResponse->getReasonPhrase();

        if ($httpStatusCode >= HttpStatusCode::OK && $httpStatusCode < HttpStatusCode::MULTIPLE_CHOICES) {
            $success = true;
        }

        if ($httpStatusCode == HttpStatusCode::TOO_MANY_REQUESTS) {
            $rateLimited = true;
        }

        $this->sdk = new SdkContainer();
        $this->sdk->outcome->success = $success ?? false;
        $this->sdk->outcome->rateLimited = $rateLimited ?? false;
        $this->sdk->outcome->http->statusCode = $httpStatusCode ?? null;
        $this->sdk->outcome->http->message = $httpMessage ?? null;
        $this->sdk->outcome->http->service = $responseBody;
        $this->sdk->outcome->http->attempts = $this->attempts ?? 1;

        if ($success ?? false) {
            $responseBody = json_decode($responseBody);
            $this->service = $responseBody;
            $this->sdk->page->previous = $responseBody->meta->prev->offset ?? null;
            $this->sdk->page->next = $responseBody->meta->next->offset ?? null;
        }
    }
}
