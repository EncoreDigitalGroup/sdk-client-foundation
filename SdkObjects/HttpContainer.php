<?php
/*
 * Encore Digital Group - Planning Center PHP SDK
 * Copyright (c) 2023-2024. Encore Digital Group
 */

namespace EncoreDigitalGroup\SdkClientFoundation\SdkObjects;

class HttpContainer
{
    public ?int $statusCode;
    public string $message;
    public string $service;
    public int $attempts;
}
