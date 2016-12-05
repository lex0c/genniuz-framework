<?php

use \PHPUnit_Framework_TestCase as TestCase;
use \System\Modules\Caching\ArrayCache;

/**
 *  
 */
final class ArrayCacheTest extends TestCase
{
    /**
     * @test
     * @expectedSuccess
     */
    public function testCreateArrayCache()
    {
        $cache = new ArrayCache();
        
        $return = $cache->create('superDay', [
        	'dom' => 'domingo',
        	'seg' => 'segunda',
        	'ter' => 'terca',
        	'qua' => 'quarta',
        	'qui' => 'quinta',
        	'sex' => 'sexta',
        	'sab' => 'sabado'
        ]);

        $this->assertTrue($return);

        return $cache;
    }

    /**
     * @test
     * @depends testCreateArrayCache
     * @expectedSuccess
     */
    public function testCreateArrayCacheWithExistingKey(ArrayCache $cache)
    {
        $return = $cache->create('superDay', [
        	'hello' => 'blablabla'
        ]);

        $this->assertFalse($return);
    }

    /**
     * @test
     * @depends testCreateArrayCache
     * @expectedSuccess
     */
    public function testCheckIfSpecificKeyExistsInCache(ArrayCache $cache)
    {
        $this->assertArrayHasKey('superDay', $cache->getAll());
    }

    /**
     * @test
     * @depends testCreateArrayCache
     * @expectedSuccess
     */
    public function testCheckIfSpecificsKeyExistsInArrayCache(ArrayCache $cache)
    {
        $this->assertArrayHasKey('id',       $cache->get('superDay'));
        $this->assertArrayHasKey('datetime', $cache->get('superDay'));
        $this->assertArrayHasKey('data',     $cache->get('superDay'));
        $this->assertArrayHasKey('edited',   $cache->get('superDay'));
    }

    /**
     * @test
     * @depends testCreateArrayCache
     * @expectedSuccess
     */
    public function testCheckIfSpecificsValuesExistsInArrayCache(ArrayCache $cache)
    {
        $this->assertNotEmpty($cache->get('superDay')['id']);
        $this->assertNotEmpty($cache->get('superDay')['datetime']);
        
        $this->assertCount(7, $cache->get('superDay')['data']);
        
        $this->assertEquals('Not edited.',  $cache->get('superDay')['edited']);
    }

    /**
     * @test
     * @depends testCreateArrayCache
     * @expectedSuccess
     */
    public function testCheckIfSpecificsKeyExistsInArrayData(ArrayCache $cache)
    {
        $this->assertArrayHasKey('dom', $cache->get('superDay')['data']);
        $this->assertArrayHasKey('seg', $cache->get('superDay')['data']);
        $this->assertArrayHasKey('ter', $cache->get('superDay')['data']);
        $this->assertArrayHasKey('qua', $cache->get('superDay')['data']);
        $this->assertArrayHasKey('qui', $cache->get('superDay')['data']);
        $this->assertArrayHasKey('sex', $cache->get('superDay')['data']);
        $this->assertArrayHasKey('sab', $cache->get('superDay')['data']);
    }

    /**
     * @test
     * @depends testCreateArrayCache
     * @expectedSuccess
     */
    public function testCheckIfSpecificsValuesExistsInArrayData(ArrayCache $cache)
    {
        $this->assertContains('domingo', $cache->get('superDay')['data']);
        $this->assertContains('segunda', $cache->get('superDay')['data']);
        $this->assertContains('terca',   $cache->get('superDay')['data']);
        $this->assertContains('quarta',  $cache->get('superDay')['data']);
        $this->assertContains('quinta',  $cache->get('superDay')['data']);
        $this->assertContains('sexta',   $cache->get('superDay')['data']);
        $this->assertContains('sabado',  $cache->get('superDay')['data']);
    }

    /**
     * @test
     * @depends testCreateArrayCache
     * @expectedSuccess
     */
    public function testEditValueInArrayData(ArrayCache $cache)
    {
        $return = $cache->edit('superDay', [
        	'dom' => 'domingo',
        	'seg' => 'segunda',
        	'ter' => 'terca',
        	'qua' => 'quarta',
        	'qui' => 'quinta',
        	'sex' => 'sexta',
        	'sab' => 'sabado',
        	'fer' => 'feriado'
        ]);

        $this->assertTrue($return);

        return $cache;
    }
    
    /**
     * @test
     * @depends testCreateArrayCache
     * @depends testEditValueInArrayData
     * @expectedSuccess
     */
    public function testCheckIfSpecificsValuesExistsInArrayCacheEdited(ArrayCache $origin, ArrayCache $edited)
    {
        $this->assertEquals($origin->get('superDay')['id'],       $edited->get('superDay')['id']);
        $this->assertEquals($origin->get('superDay')['datetime'], $edited->get('superDay')['datetime']);
        
        $this->assertCount(8, $edited->get('superDay')['data']);
        
        $this->assertArrayHasKey('fer',   $edited->get('superDay')['data']);
        $this->assertContains('feriado',  $edited->get('superDay')['data']);

        $this->assertNotEquals('Not edited.',  $edited->get('superDay')['edited']);
    }

    /**
     * @test
     * @depends testEditValueInArrayData
     * @expectedSuccess
     */
    public function testDeleteSpecificCacheByKey(ArrayCache $cache)
    {
        $this->assertTrue($cache->delete('superDay'));

        return $cache;
    }

    /**
     * @test
     * @depends testDeleteSpecificCacheByKey
     * @expectedSuccess
     */
    public function testCheckIfSpecificKeyExistsPosDelete(ArrayCache $cache)
    {
        $this->assertArrayNotHasKey('superDay', $cache->getAll());
    }

    /**
     * @test
     * @depends testCreateArrayCache
     * @expectedSuccess
     */
    public function testDeleteAllCache(ArrayCache $cache)
    {
        $this->assertTrue($cache->removeAll());
        $this->assertArrayNotHasKey('superDay', $cache->getAll());
    }

    //...

    // *
    //  * @test
    //  * @expectedException InvalidArgumentException
     
    // public function testInvalidArgumentException()
    // {}

}