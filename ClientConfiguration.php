<?php

/*
 * Encore Digital Group - Planning Center PHP SDK
 * Copyright (c) 2023-2024. Encore Digital Group
 */

namespace EncoreDigitalGroup\SdkClientFoundation;

use EncoreDigitalGroup\SdkClientFoundation\Interfaces\IClientConfiguration;

/**
 * @api
 */
class ClientConfiguration implements IClientConfiguration
{
    const DEFAULT_AUTHORIZATION_TYPE = 'Basic';

    protected string $authorization;
    protected string $authorizationToken;
    protected string $authorizationType;
    protected string $baseUri;

    public function getAuthorization(): string
    {
        return $this->getAuthorizationType() . ' ' . $this->getAuthorizationToken();
    }

    public function setAuthorizationToken(?string $authorizationToken = null): void
    {
        $this->authorizationToken = $authorizationToken ?? $this->getAuthorization();
    }

    public function getAuthorizationToken(): string
    {
        return $this->authorizationToken ?? '';
    }

    public function setAuthorizationType(?string $authorizationType = null): void
    {
        $this->authorizationType = $authorizationType ?? $this->getAuthorizationType();
    }

    public function getAuthorizationType(): string
    {
        return $this->authorizationType ?? self::DEFAULT_AUTHORIZATION_TYPE;
    }

    public function setBaseUri(string $baseUri): void
    {
        $this->baseUri = $baseUri;
    }

    public function getBaseUri(): string
    {
        return $this->baseUri;
    }
}
