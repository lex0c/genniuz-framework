<?php namespace Tests\PHPUnit;

use \PHPUnit_Framework_TestCase as TestCase;
use \Resources\Helpers\Slug;

/**
 *  
 */
final class SlugTest extends TestCase
{
    /**
     * @test
     * @expectedSuccess
     */
    public function testGenerateSlug()
    {
    	$dataInput = 'Testando o slugin PHP.php';
    	$slug = Slug::convert($dataInput)[0];
        $this->assertEquals('testando-o-slugin-php.php', $slug);
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testGetOnlyTitle()
    {
    	$dataInput = 'Testando o slugin PHP.php';
    	$slug = Slug::convert($dataInput, true)[0];
        $this->assertEquals('testando-o-slugin-php', $slug);
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testGetOnlyExtension()
    {
    	$dataInput = 'Testando o slugin PHP.php';
    	$slug = Slug::convert($dataInput, true)[1];
        $this->assertEquals('.php', $slug);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function testInvalidArgumentExceptionInConvert()
    {
    	$slug = Slug::convert('')[0];
    }

}