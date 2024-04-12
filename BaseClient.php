<?php
/*
 * Encore Digital Group - Planning Center PHP SDK
 * Copyright (c) 2023-2024. Encore Digital Group
 */

namespace EncoreDigitalGroup\SdkClientFoundation;

use EncoreDigitalGroup\SdkClientFoundation\SdkObjects\ClientResponse;
use GuzzleHttp\Client;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;

class BaseClient
{
    protected ClientConfiguration $config;
    protected GuzzleClient $client;
    protected int $attempts;

    public function __construct(mixed $config)
    {
        $this->config = $this->setConfiguration($config);
        $this->createClient();
    }

    public function setConfiguration(ClientConfiguration $config): ClientConfiguration
    {
        $this->config = $config;

        return $this->config;
    }

    public function getConfiguration(): ClientConfiguration
    {
        return $this->config;
    }

    public function createClient(): void
    {
        $handler = new CurlHandler;
        $stack = HandlerStack::create($handler);
        $this->client = new GuzzleClient([
            'base_uri' => $this->config->getBaseUri(),
            'handler' => $stack,
        ]);
    }

    public function getClient(): GuzzleClient
    {
        return $this->client;
    }

    public function send(Request $request, int $attemptLimit = 5, int $attempt = 1): ClientResponse
    {
        $this->attempts = $attempt;
        $client = $this->getClient();

        try {
            $res = $client->sendAsync($request)->wait();
        } catch (ClientException $e) {
            if ($attempt <= $attemptLimit) {
                $i = $attempt + 1;

                return $this->send($request, $attemptLimit, $i);
            }

            return $this->processResponse($e->getResponse());
        }

        return $this->processResponse($res);

    }

    protected function processResponse(mixed $res): ClientResponse
    {
        return new ClientResponse($res);
    }
}
