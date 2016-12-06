<?php

use \PHPUnit_Framework_TestCase as TestCase;
use \System\Modules\Filesystem\FileHandler;

use \Slim\Http\Body;
use \Slim\Http\Headers;
use \Slim\Http\Response;

/**
 *  
 */
final class FileManipulatorTest extends TestCase
{
	/**
     * Inject a the handler.
     * @var FileHandler
     */
	private $handler = null;
	
	/**
     * @test
     * @Constructor
     */
    public function setUp()
    {
        $this->handler = new FileHandler(__DIR__ . '/files/');
    }

    /**
     * @test
     * 
     * If the path is not a directory a runtime exception is thrown launched.
     * 
     * @expectedException RuntimeException
     */
    public function testRuntimeExceptionInConstructor()
    {
        new FileHandler(__DIR__ . '/files/filetxt.txt');
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testFileExists()
    {
        $this->assertTrue($this->handler->exists('filetxt.txt'));
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testFileNotExists()
    {
        $this->assertFalse($this->handler->exists('snviobibi.txt'));
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testFileExistsWithCustomPath()
    {
        $this->assertTrue($this->handler->exists('filetxt.txt', __DIR__ . '/files/'));
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testFileExistsInSubDir()
    {
        $this->assertTrue($this->handler->exists('subdir/foo.php'));
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testReadFile()
    {
        
    }

}