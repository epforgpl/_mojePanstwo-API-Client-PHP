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

    private $conErrorCode;

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
class ApiHttpError extends ApiException {

    private $httpErrorCode;

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
