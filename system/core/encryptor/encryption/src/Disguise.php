<?php namespace Encryptor;

/**
 * Disguise for Low Encryption
 * @link https://github.com/lleocastro/encryptor/
 * @license (MIT) https://github.com/lleocastro/encryptor/blob/master/LICENSE
 * @author Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package \Encryptor
 * @copyright 2016 
 * @version 1.0.1
 */
class Disguise
{
    /**
     * Logic from Encryption
     * The key is encrypted in Base64 then, divided in half, inverted and encrypted again
     * @param (int) $data for encryption
     * @return (string) encrypted $data
     */
    final public function obscure($data)
    {
        $encryptedData = base64_encode($data);
        return base64_encode(strrev(substr($encryptedData, (strlen($encryptedData)/2)-strlen($encryptedData)
            ,strlen($encryptedData)).substr($encryptedData, 0, (strlen($encryptedData)/2)-strlen($encryptedData))));
    }

    /**
     * Logic from Decryption
     * Reverse process of 'obscure()' to recover the original value.
     * @param (int) $data encrypted
     * @return (int) original $data
     */
    final public function illumin($encryptedData)
    {
    	$encryptedData = base64_decode($encryptedData);
        $encryptedData = strrev(
    	    substr($encryptedData, (strlen($encryptedData)/2)-strlen($encryptedData),strlen($encryptedData))
    	    .substr($encryptedData, 0, (strlen($encryptedData)/2)-strlen($encryptedData)));
        return base64_decode($encryptedData);
    }

}