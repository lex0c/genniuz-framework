<?php

use \PHPUnit_Framework_TestCase as TestCase;
use \System\Modules\View\Renderer;

use \Slim\Http\Body;
use \Slim\Http\Headers;
use \Slim\Http\Response;

/**
 *  
 */
final class RendererTest extends TestCase
{
    /**
     * @test
     * @expectedSuccess
     */
    public function testGetDataInTemplateRendered()
    {
        $view = new Renderer(__DIR__);
       
        $headers = new Headers();
        $body = new Body(fopen('php://temp', 'r+'));
        $response = new Response(200, $headers, $body);
        
        $getResponse = $view->render($response, 'view-hello.php', [
            'hello' => 'Testing'
        ]);
        
        $getResponse->getBody()->rewind();
        
        $this->assertEquals('Testing', $getResponse->getBody()->getContents());
    }

    /**
     * @test
     * @expectedSuccess
     */
    public function testMergingOfData()
    {
        $view = new Renderer(__DIR__, ['hello' => 'Testing']);
        
        $headers = new Headers();
        $body = new Body(fopen('php://temp', 'r+'));
        $response = new Response(200, $headers, $body);
        
        $getResponse = $view->render($response, 'view-hello.php', [
            'hello' => 'Testing'
        ]);
        
        $getResponse->getBody()->rewind();
        
        $this->assertEquals('Testing', $getResponse->getBody()->getContents());
    }

    /**
     * @test
     * @expectedException RuntimeException
     */
    public function testTemplateNotFoundInMethodRender()
    {
        $view = new Renderer(__DIR__);

        $headers = new Headers();
        $body = new Body(fopen('php://temp', 'r+'));
        $response = new Response(200, $headers, $body);
        
        $view->render($response, 'dsvbsucbsui.php', [
            'hello' => 'Testing'
        ]);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function testDuplicateKeyInArrayData()
    {
        $view = new Renderer(__DIR__);
        
        $headers = new Headers();
        $body = new Body(fopen('php://temp', 'r+'));
        $response = new Response(200, $headers, $body);
        
        $view->render($response, 'view-hello.php', [
            'template' => 'Testing'
        ]);
    }

    

}