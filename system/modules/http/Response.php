<?php namespace System\Modules\HTTP;

/*
 ===========================================================================
 = HTTP Response
 ===========================================================================
 =
 = Manages the response status, headers, and body according to the 
 = PSR-7 standard.
 = 
 */

use \Psr\Http\Message\ResponseInterface;
use \Psr\Http\Message\StreamInterface;

use \InvalidArgumentException;
use \RuntimeException;

/**
 * Response
 * @link https://github.com/lleocastro/genniuz-framework/
 * @license (MIT) https://github.com/lleocastro/genniuz-framework/blob/master/LICENSE
 * @author Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package \System\Modules\HTTP
 * @copyright 2016 
 * @version 1.0.0
 */
class Response implements ResponseInterface
{
	/**
     * Status code.
     * @var int
     */
    private $status = 200;

    /**
     * Reason phrase.
     * @var string
     */
    private $reasonPhrase = '';

    /**
     * Reason phrase.
     * @var int
     */
    private $statusCode = 000;

    /**
     * Map of standard HTTP status code.
     * @var array
     */
    protected $phrases = [
        //Informational Codes (1xx)
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',
        
        //Success Codes (2xx)
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-status',
        208 => 'Already Reported',
        226 => 'IM used',
        
        //Redirection Codes (3xx)
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => '(Unused)',
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',
        
        //Client Errors (4xx)
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Time-out',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Large',
        415 => 'Unsupported Media Type',
        416 => 'Requested range not satisfiable',
        417 => 'Expectation Failed',
        418 => 'I\'m a teapot',
        421 => 'Misdirected Request',
        422 => 'Unprocessable Entity',
        423 => 'Locked',
        424 => 'Failed Dependency',
        425 => 'Unordered Collection',
        426 => 'Upgrade Required',
        428 => 'Precondition Required',
        429 => 'Too Many Requests',
        431 => 'Request Header Fields Too Large',
        444 => 'Connection Closed Without Response',
        451 => 'Unavailable For Legal Reasons',
        
        //Server Errors (5xx)
        499 => 'Client Closed Request',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Time-out',
        505 => 'HTTP Version not supported',
        506 => 'Variant Also Negotiates',
        507 => 'Insufficient Storage',
        508 => 'Loop Detected',
        510 => 'Not Extended',
        511 => 'Network Authentication Required',
        599 => 'Network Connect Timeout Error',
    ];

    /**
     * Create new HTTP response.
     * @param int $status
     * @param array $headers
     * @param StreamInterface $body
     * @return void
     */
    public function __construct(int $status = 200, array $headers = [], StreamInterface $body = null)
    {}



    /**
     * Gets the response status code.
     * @return int
     */
    public function getStatusCode():int
    {
        return $this->statusCode;
    }

    /**
     * Gets the response reason phrase associated with the status code.
     * @return string
     */
    public function getReasonPhrase():string
    {
        if((!$this->reasonPhrase) && (isset($this->phrases[$this->statusCode]))):
            $this->reasonPhrase = $this->phrases[$this->statusCode];
        endif;

        return $this->reasonPhrase;
    }

    /**
     * Return an instance with the specified status code and, optionally, a phrase.
     * @param int $code
     * @param string $reasonPhrase
     * @return Response
     */
    public function withStatus(int $code, string $reasonPhrase = ''):Response
    {
        $self = clone $this;
        $self->setStatusCode($code);
        $self->reasonPhrase = $reasonPhrase;
        return $self;
    }

    /**
     * Validate status code.
     * @param int $code
     * @return bool
     * 
     * @throws InvalidArgumentException
     */
    protected function setStatusCode(int $code):bool
    {
        if(($code >= 100) || ($code <= 599)):
            $this->statusCode = $code;
            return true;            
        endif;

        throw new InvalidArgumentException('Invalid HTTP status code.');
    }

    


}