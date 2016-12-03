<?php

use \PHPUnit_Framework_TestCase as TestCase;
use \Resources\Helpers\GetHTML;

/**
 *  
 */
final class GetHTMLTest extends TestCase
{
    private $html = '<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<link rel="stylesheet" href="../css/bootstylle.css"/>
				<title>Bootstylle - Grid System</title>
			</head>
			<body>	
			    <main class="container container-space text-center border-all">
			        <div class="line line-space border-all">
			    	    <div class="collist col-space border-all">Column List</div>
			        </div>
			        <div class="line line-space border-all">
			    	    <div class="s6col col-space border-all">Column Small 6</div>
			    	    <div class="s6col col-space border-all">Column Small 6</div>
			        </div>
			        <div class="line line-space border-all">
			    	    <div class="m4col col-space border-all">Column Medium 4</div>
			    	    <div class="m4col col-space border-all">Column Medium 4</div>
			    	    <div class="m4col col-space border-all">Column Medium 4</div>
			        </div>
			        <div class="line line-space border-all">
			    	    <div class="l3col col-space border-all">Column Large 3</div>
			    	    <div class="l3col col-space border-all">Column Large 3</div>
			    	    <div class="l3col col-space border-all">Column Large 3</div>
			    	    <div class="l3col col-space border-all">Column Large 3</div>
			        </div>
			        <div class="line line-space col-space border-all">
			            <div class="s8col m6col col-space border-all">
			                Column Small 8 - Column Medium 6
			            </div>
			            <div class="s4col m6col col-space border-all">
			                Column Small 4 - Column Medium 6
			            </div>
			        </div>
			    </main>
			</body>
			</html>
	';


    /**
     * @test
     * @expectedSuccess
     */
    public function testGetHTMLToString()
    {
    	$html = new GetHTML($this->html);
        $this->assertEquals($this->html, $html);
    }
    
    // ...

}