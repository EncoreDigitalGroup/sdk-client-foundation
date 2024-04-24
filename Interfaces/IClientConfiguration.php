<?php

namespace EncoreDigitalGroup\SdkClientFoundation\Interfaces;

interface IClientConfiguration
{
    public function getAuthorization(): string;

    public function setAuthorizationToken(?string $authorizationToken = null): void;

    public function getAuthorizationToken(): string;

    public function setAuthorizationType(?string $authorizationType = null): void;

    public function getAuthorizationType(): string;

    public function setBaseUri(string $baseUri): void;

    public function getBaseUri(): string;
}
