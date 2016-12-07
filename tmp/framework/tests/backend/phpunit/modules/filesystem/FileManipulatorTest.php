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
        $this->handler = new FileHandler((__DIR__) . '/files/');
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testCreateFileNotFinalBar()
    {
        $handler = new FileHandler((__DIR__) . '/files');
    }

    /**
     * @test
     * 
     * If the path is not a directory or not exists a 
     * runtime exception is thrown launched.
     * 
     * @expectedException RuntimeException
     */
    public function testExceptionByDirNotExists()
    {
        new FileHandler((__DIR__) . '/filesin/');
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testCreateFile()
    {
        $this->assertTrue($this->handler->create('hello.txt'));
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testCreateFileWithCustomPath()
    {
        $this->assertTrue($this->handler->create('things.txt', 
        	(__DIR__) . '/files/something/'));
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testCreateFileNotForce()
    {
        $this->assertTrue($this->handler->create('hello2.txt', 
        	(__DIR__) . '/files/something/', false));
    }

    /**
     * @test
     * @expectedException Exception
     */
    public function testExceptionByRecreateFileExisting()
    {
        $this->handler->create('hello.txt');
    }

    /**
     * @test
     * @expectedException Exception
     */
    public function testExceptionByInvalidCustomPathInCreate()
    {
        $this->handler->create('something.txt', 
        	(__DIR__) . '/filesdf/');
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testCheckFileExists()
    {
        $this->assertTrue($this->handler->exists('hello.txt'));
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testCheckFileExistsWithCustomPath()
    {
        $this->assertTrue($this->handler->exists('things.txt', 
        	(__DIR__) . '/files/something'));
    }

    /**
     * @test
     * @expectedFailue
     */
    public function testCheckFileNotExists()
    {
        $this->assertFalse($this->handler->exists('helloinn.txt'));
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testReadFile()
    {
        $this->assertEquals('alalah', $this->handler->read('readable.txt'));
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testReadFileWithCustomPath()
    {
        $this->assertEquals('alalah', 
        	$this->handler->read('readable.txt', (__DIR__) . '/files/'));
    }
    
    /**
     * @test
     * @expectedSuccess
     */
    public function testReadFileNotForce()
    {
        $this->assertEquals('alalah', $this->handler->read('readable.txt', false));
    }

    /**
     * @test
     * @expectedException Exception
     */
    public function testExceptionByReadFileNotExisting()
    {
        $this->handler->read('aodjfvcde.txt');
    }

    /**
     * @test
     * @expectedException Exception
     */
    public function testExceptionByInvalidCustomPathInRead()
    {
        $this->handler->read('readable.txt', 
        	(__DIR__) . '/filesdf/');
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testWriteFile()
    {
    	$data = 'Olaola';

        $this->assertTrue($this->handler->write('writable.txt', $data));
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testWriteFileWithCustomPath()
    {
    	$data = 'printnoblaa';

        $this->assertTrue($this->handler->write('writable.txt', $data, 
        	(__DIR__) . '/files/'));
    }
    
    /**
     * @test
     * @expectedSuccess
     */
    public function testWriteFileNotForce()
    {
    	$data = 'briefing';

        $this->assertTrue($this->handler->append('writable.txt', $data, false));
    }

    /**
     * @test
     * @expectedException Exception
     */
    public function testExceptionByWriteFileNotExisting()
    {
    	$data = 'lol';

        $this->handler->append('aodjfvcde.txt', $data);
    }

    /**
     * @test
     * @expectedException Exception
     */
    public function testExceptionByInvalidCustomPathInWrite()
    {
    	$data = 'goool';

        $this->handler->append('writable.txt', $data, 
        	(__DIR__) . '/filesdf/');
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testAppendFile()
    {
    	$data = 'Two do u.';

        $this->assertTrue($this->handler->append('appendable.txt', $data));
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testAppendFileWithCustomPath()
    {
    	$data = 'moremoremore';

        $this->assertTrue($this->handler->append('appendable.txt', $data, 
        	(__DIR__) . '/files/'));
    }
    
    /**
     * @test
     * @expectedSuccess
     */
    public function testAppendFileNotForce()
    {
    	$data = 'abcdef';

        $this->assertTrue($this->handler->append('appendable.txt', $data, false));
    }

    /**
     * @test
     * @expectedException Exception
     */
    public function testExceptionByAppendFileNotExisting()
    {
    	$data = 'abcdef';

        $this->handler->append('aodjfvcde.txt', $data);
    }

    /**
     * @test
     * @expectedException Exception
     */
    public function testExceptionByInvalidCustomPathInAppend()
    {
    	$data = 'abcdef';

        $this->handler->append('appendable.txt', $data, 
        	(__DIR__) . '/filesdf/');
    }

    


    //...








    /**
     * @test
     * @expectedSuccess
     */
    public function testDeleteFile()
    {
    	$this->assertTrue($this->handler->delete('hello.txt'));
    }
    
    /**
     * @test
     * @expectedSuccess
     */
    public function testDeleteFileWithCustomPath()
    {
    	$this->assertTrue($this->handler->delete('hello2.txt', 
    		(__DIR__) . '/files/something/'));
    	
    	$this->assertTrue($this->handler->delete('things.txt', 
    		(__DIR__) . '/files/something/'));
    }

}