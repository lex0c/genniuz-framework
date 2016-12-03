<?php namespace Resources\Helpers;

/*
 ===========================================================================
 = Get HTML
 ===========================================================================
 =
 = ...
 = 
 */

/**
 * HTML Getter
 * @link https://github.com/lleocastro/genniuz-framework/
 * @license (MIT) https://github.com/lleocastro/genniuz-framework/blob/master/LICENSE
 * @author Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package \Resources\Helpers;
 * @copyright 2016 
 * @version 1.0.0
 */
class GetHTML
{
    /**
     * The HTML
     * @var string
     */
    private $html = '';

    /**
     * Create new HTML
     * @param string $html
     * @return void
     */
    public function __construct(string $html)
    {
        $this->html = $html;
    }

    /**
     * @return string
     */
    protected function getHTMLString():string
    {
        return $this->html;
    }

    /**
     * Override
     * @return string
     */
    public function __toString()
    {
        return $this->getHTMLString();
    }

}