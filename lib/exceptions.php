<?php

namespace MP;

class ApiException extends \Exception {
    public function __toString()
    {
        return get_class($this) . ": ". $this->message;
    }
}

class ApiRequestMethodNotSupported extends ApiException {
    public function __construct($message = null, Exception $previous = null) {
        parent::__construct($message, 11, $previous);
    }
}

class ApiBadInvocation extends ApiException {
    public function __construct($message = null, Exception $previous = null) {
        parent::__construct($message, 1, $previous);
    }
}

/**
 * Connection exception
 *
 * @package MP
 */
class ApiConnectionException extends ApiException {

    protected $conErrorCode;

    public function __construct($connErrorCode, $message = null, Exception $previous = null) {
        parent::__construct($message, 2, $previous);

        $this->conErrorCode = $connErrorCode;
    }

    /**
     * @return mixed CURL Error code
     * @see http://curl.haxx.se/libcurl/c/libcurl-errors.html
     */
    public function getConnectionErrorCode() {
        return $this->conErrorCode;
    }
}

/**
 * Server returned HTTP error code
 *
 * @package MP
 */
class ApiHttpException extends ApiException {

    protected $httpErrorCode;

    public function __construct($httpErrorCode, $message = null, Exception $previous = null) {
        parent::__construct($message, 2, $previous);

        $this->httpErrorCode = $httpErrorCode;
    }

    public function __toString()
    {
        return get_class($this) . "[$this->httpErrorCode]: ". $this->message;
    }

    public function getHttpErrorCode() {
        return $this->httpErrorCode;
    }
}

class ApiValidationException extends ApiHttpException {

    protected $errors;

    public function __construct($httpErrorCode, $message, Exception $previous = null) {
        parent::__construct($httpErrorCode, $message, $previous);

        $payload = json_decode($message, true);
        $this->errors = $payload['errors'];
    }

    public function __toString()
    {
        return get_class($this) . "[$this->httpErrorCode]: Validation failed: " . implode(",", array_keys($this->errors));
    }

    public function getValidationErrors() {
        return $this->errors;
    }
}

class ApiCustomException extends ApiHttpException {

    /**
     * @var kod błędu, opisany na konkretnym API
     */
    protected $apiErrorCode = null;

    /**
     * @var parametry błędu (niezależne od języka, specyficzne dla danego kodu błędu)
     */
    protected $params = null;

    /**
     * @var opis błędu
     */
    protected $error_description;

    public function __construct($httpErrorCode, $message, Exception $previous = null) {
        parent::__construct($httpErrorCode, $message, $previous);

        $payload = json_decode($message, true);

        $this->apiErrorCode = $payload['code'];
        $this->params = $payload['params'];
        $this->error_description = $payload['error_description'];
    }

    public function __toString()
    {
        return get_class($this) . "[$this->httpErrorCode, $this->apiErrorCode]: $this->error_description";
    }

    public function getApiExceptionCode() {
        return $this->apiErrorCode;
    }

    public function getParams() {
        return $this->params;
    }

    public function getDescription() {
        return $this->error_description;
    }
}
