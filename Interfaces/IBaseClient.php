<?php

namespace EncoreDigitalGroup\SdkClientFoundation\Interfaces;

use EncoreDigitalGroup\SdkClientFoundation\ClientConfiguration;
use EncoreDigitalGroup\SdkClientFoundation\SdkObjects\ClientResponse;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Request;

interface IBaseClient
{
    public function setConfiguration(ClientConfiguration $config): ClientConfiguration;

    public function getConfiguration(): ClientConfiguration;

    public function createClient(): void;

    public function getClient(): GuzzleClient;

    public function send(Request $request, int $attemptLimit = 5, int $attempt = 1): ClientResponse;
}