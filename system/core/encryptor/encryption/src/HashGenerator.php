<?php namespace Encryptor;

/*
 ===========================================================================
 = Hash Generator
 ===========================================================================
 =
 = Generates a 107 bits hash for encoding passwords and data that does not 
 = need to retrieve the value retrieved.
 = 
 */

use \Encryptor\Disguise;
use \InvalidArgumentException;

/**
 * PHP Hard Hash Generator
 * Safety against scripts injections
 * Generates an encrypted hash of 107 byte
 * @link https://github.com/lleocastro/encryptor
 * @license https://github.com/lleocastro/encryptor/blob/master/LICENSE
 * @author Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @copyright 2016 (MIT License)
 * @package \Encryptor
 * @copyright 2016 
 * @version 1.0.2
 */
class HashGenerator extends Disguise
{
    /**
     * Encryption prefix
     * @see http://www.php.net/security/crypt_blowfish.php
     * @var string
     */
    protected $prefix = '2a';

    /**
     * Salt [MTc2MzMxNDQ4NTdmZDg4Yz]
     * @see http://www.php.net/security/crypt_blowfish.php
     * @var string
     */
    private $salt = '';

    /**
     * Custo default '8' [4 <> 31]
     * @see http://www.php.net/security/crypt_blowfish.php
     * @var int
     */
    protected $cust = 8;

    /**
     * Secret hash for hard encryption
     * @var string
     */
    private $secret = [];
    private $key = '';


    /**
     * Encrypter Factory
     * @param string $prefix
     * @param string $hash
     * @param string $cust
     */
    public function __construct($prefix = '', $salt = '', $cust = 8)
    {
        if((!is_string($prefix)) && (!is_string($salt)) && (!is_int($cust))):
            throw new InvalidArgumentException('Arguments not valid!');
        endif;

    	$p = (string) trim(htmlentities(strip_tags($prefix)));
    	$s = (string) trim(htmlentities(strip_tags($salt)));
    	$c = (int)    htmlentities(strip_tags($cust));
    	
        $this->prefix = ((empty($p))?'2a':$p);
    	$this->salt   = ((empty($s))?$this->generateHash():$s);
        $this->cust   = ((empty($c))?8:$c);
    }

    /**
     * Encrypt Generate
     * @param string $value
     * @return string encrypted
     */
    public function encode($value)
    {
        return str_replace('=', '', strrev($this->obscure(
            crypt(
        	    (string) trim(htmlentities(strrev($value))), 
        	    $this->generateHash()
            )
        )));
    }

    /**
     * Compare hashes
     * @param string $value
     * @param string $hash
     * @return boolean
     */
    public function isEquals($value, $hash) 
    {
	    $v = (string) trim(htmlentities(strrev($value)));
	    $h = $this->illumin((string) trim(htmlentities(strrev($hash))));
        
        if(crypt($v, $h) === $h):
            return true;
        endif;

        return false;
    }

    /**
     * Generate a random salt
     * @return aleatory string encoded
     */
	protected function generateSalt() 
	{
        return substr(base64_encode(uniqid(mt_rand(), true)), 0, 22);
	}

    /**
     * Build a hash string for crypt
     * @return formated string
     */
	protected function generateHash() 
	{
        return sprintf('$%s$%02d$%s$', $this->prefix, $this->cust, $this->generateSalt());
	}

}