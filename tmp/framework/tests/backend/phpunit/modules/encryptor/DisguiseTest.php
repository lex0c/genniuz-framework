<?php

use \PHPUnit_Framework_TestCase as TestCase;
use \System\Modules\Encryptor\Disguise;

/**
 *  
 */
final class DisguiseTest extends TestCase
{
    /**
     * @test
     * @expectedSuccess
     */
    public function testEncryptingData()
    {
        $hash = new Disguise();
        $dataInput = 'This is Rock `Ǹ` Roll!';
        
        $encrypted = $hash->obscure($dataInput);
        
        $this->assertEquals('ck4yYlNCeWNwQnljcGhHVj1FQ2JzOW1VZ0FHdUhER0k=', $encrypted);
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testDecryptingData()
    {
        $hash = new Disguise();
        $dataInput = 'This is Rock `Ǹ` Roll!';
        
        $encrypted = $hash->obscure($dataInput);
        $decrypted = $hash->illumin($encrypted);
        
        $this->assertEquals('This is Rock `Ǹ` Roll!', $decrypted);
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testScapeTagsInObscure()
    {
        $hash = new Disguise();
        $dataInput = '<?php phpinfo(); ?>';
        
        $encrypted = $hash->obscure($dataInput);
        
        $this->assertEquals('V2F3aEdjZ0FIYXc5ek8weG1KPT13TzBkbUovQXlPcGd5Ym01', $encrypted);
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testScapeTagsInIllumin()
    {
        $hash = new Disguise();
        $dataInput = '<?php phpinfo(); ?>';
        
        $encrypted = $hash->obscure($dataInput);
        $decrypted = $hash->illumin($encrypted);
        
        $this->assertEquals('&lt;?php phpinfo(); ?&gt;', $decrypted);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function testInvalidArgumentExceptionInObscure()
    {
        $hash = new Disguise();
        $dataInput = '';
        
        $encrypted = $hash->obscure($dataInput);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function testInvalidArgumentExceptionInIllumin()
    {
        $hash = new Disguise();
        $dataInput = 'This is Rock `Ǹ` Roll!';
        
        $encrypted = $hash->obscure($dataInput);
        $decrypted = $hash->illumin('');
    }

}