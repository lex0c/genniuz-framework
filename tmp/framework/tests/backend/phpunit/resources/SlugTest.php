<?php

use \PHPUnit_Framework_TestCase as TestCase;
use \Resources\Helpers\Slug;

/**
 *  
 */
final class SlugTest extends TestCase
{
    private $dataInput = 'Testando o slugin PHP.php';

    /**
     * @test
     * @expectedSuccess
     */
    public function testGenerateSlug()
    {
    	$slug = Slug::convert($this->dataInput);
        $this->assertEquals('testando-o-slugin-php.php', $slug);
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testGetOnlyTitle()
    {
    	$slug = Slug::convert($this->dataInput, true)[0];
        $this->assertEquals('testando-o-slugin-php', $slug);
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testGetOnlyExtension()
    {
    	$slug = Slug::convert($this->dataInput, true)[1];
        $this->assertEquals('.php', $slug);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function testInvalidArgumentExceptionInConvert()
    {
    	$slug = Slug::convert('');
    }

}