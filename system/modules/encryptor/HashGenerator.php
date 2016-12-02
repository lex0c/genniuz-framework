<?php namespace System\Modules\Encryptor;

/*
 ===========================================================================
 = Hash Generator
 ===========================================================================
 =
 = Generates a 107 bits hash for encoding passwords and data that does not 
 = need to retrieve the value retrieved.
 = 
 */

use \System\Modules\Encryptor\Disguise;
use \InvalidArgumentException;

/**
 * PHP Hard Hash Generator
 * Safety against scripts injections
 * Generates an encrypted hash of 107 byte
 * @link https://github.com/lleocastro/genniuz-framework/
 * @license (MIT) https://github.com/lleocastro/genniuz-framework/blob/master/LICENSE
 * @author Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package \System\Modules\Encryptor
 * @copyright 2016 
 * @version 1.0.0
 */
class HashGenerator extends Disguise
{
    /**
     * Encryption prefix.
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
     * Secret hash for hard encryption.
     * @var string
     */
    private $secret = [];
    private $key = '';


    /**
     * Encrypter Constructor.
     * @param string $prefix
     * @param string $hash
     * @param string $cust
     * @return void
     */
    public function __construct(string $prefix = '', string $salt = '', int $cust = 8)
    {
    	$p = trim(htmlentities(strip_tags($prefix)));
    	$s = trim(htmlentities(strip_tags($salt)));
    	
        $this->prefix = ((empty($p))?'2a':$p);
    	$this->salt   = ((empty($s))?$this->generateHash():$s);
        $this->cust   = (($cust < 4 || $cust > 31)?8:$cust);
    }

    /**
     * Encrypt Generate.
     * @param string $value
     * @return string
     */
    public function encode(string $value):string
    {
        return str_replace('=', '', strrev($this->obscure(
            crypt(
        	    (string) trim(htmlentities(strrev($value))), 
        	    $this->generateHash()
            )
        )));
    }

    /**
     * Compare hashes.
     * @param string $value
     * @param string $hash
     * @return boolean
     */
    public function isEquals(string $value, string $hash):bool
    {
	    $v = (string) trim(htmlentities(strrev($value)));
	    $h = $this->illumin((string) trim(htmlentities(strrev($hash))));
        
        if(crypt($v, $h) === $h):
            return true;
        endif;

        return false;
    }

    /**
     * Generate a random salt.
     * @return string
     */
	protected function generateSalt():string
	{
        return substr(base64_encode(uniqid(mt_rand(), true)), 0, 22);
	}

    /**
     * Build a hash string for crypt.
     * @return string
     */
	protected function generateHash():string 
	{
        return sprintf('$%s$%02d$%s$', $this->prefix, $this->cust, $this->generateSalt());
	}

}