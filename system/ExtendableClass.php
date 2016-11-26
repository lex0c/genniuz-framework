<?php namespace System;

/**
* 
*/

abstract class ExtendableClass
{
    private $extenders = [];

    public function addExtender(Extender $obj)
    {
        $this->extenders[] = $obj;
        $obj->setExtendee($this);
    }

    public function __call($name, $params)
    {
        foreach($this->extenders as $extender):     
           //Do reflection to see if extender has this method with this argument count
            if(method_exists($extender, $name)):
                return call_user_func_array(array($extender, $name), $params);
            endif;
        endforeach;
    }

}