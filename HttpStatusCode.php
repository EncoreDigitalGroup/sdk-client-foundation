<?php

namespace EncoreDigitalGroup\SdkClientFoundation;

/**
 * @api
 */ class HttpStatusCode
{
    const int OK = 200;
    const int CREATED = 201;
    const int ACCEPTED = 202;
    const int NO_CONTENT = 204;
    const int MULTIPLE_CHOICES = 300;
    const int MOVED_PERMANENTLY = 301;
    const int FOUND = 302;
    const int PERMANENT_REDIRECT = 301;
    const int TEMPORARY_REDIRECT = 302;
    const int SEE_OTHER = 303;
    const int NOT_MODIFIED = 304;
    const int PERMANENT_REDIRECT_REAL = 307;
    const int TEMPORARY_REDIRECT_REAL = 308;
    const int BAD_REQUEST = 400;
    const int UNAUTHORIZED = 401;
    const int FORBIDDEN = 403;
    const int NOT_FOUND = 404;
    const int METHOD_NOT_ALLOWED = 405;
    const int CONFLICT = 409;
    const int GONE = 410;
    const int PRECONDITION_FAILED = 412;
    const int PAYLOAD_TOO_LARGE = 413;
    const int UNSUPPORTED_MEDIA_TYPE = 415;
    const int TOO_MANY_REQUESTS = 429;
    const int INTERNAL_SERVER_ERROR = 500;
    const int BAD_GATEWAY = 502;
    const int SERVICE_UNAVAILABLE = 503;
    const int GATEWAY_TIMEOUT = 504;
    const int NETWORK_AUTHENTICATION_REQUIRED = 511;
}
