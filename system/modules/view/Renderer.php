<?php namespace System\Modules\View;

/*
 ===========================================================================
 = Application View
 ===========================================================================
 =
 = Load template...
 = 
 */

use \Psr\Http\Message\ResponseInterface;
use \RuntimeException;

/**
 * View Renderer
 * @link https://github.com/lleocastro/genniuz-framework/
 * @license (MIT) https://github.com/lleocastro/genniuz-framework/blob/master/LICENSE
 * @author Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package \System\Modules\View;
 * @copyright 2016 
 * @version 1.0.0
 */
class Renderer
{
    /**
     * Complete path to a template.
     * @var string
     */
    private $templatePath = '';

    /**
     * Attributes to use in template.
     * @var array
     */
    private $attributes = [];

    /**
     * Inject the path to template.
     * @param string $templatePath
     * @param array $attributes [optional]
     */
    public function __construct($templatePath, array $attributes = [])
    {
        if(substr($templatePath, -1) !== '/'):
            $templatePath .= '/';
        endif;

        $this->setTemplatePath($templatePath);
        $this->setAttributes($attributes);
    }

    /**
     * Rendering to template.
     * @param ResponseInterface $response 
     * @param string $template
     * @param array $data
     * @return ResponseInterface
     */
    public function render(ResponseInterface $response, string $template, array $data = []):ResponseInterface
    {
        $response->getBody()->write(
            $this->process($template, array_map("htmlspecialchars", $data))
        );
        
        return $response;
    }

    /**
     * Process the model and return.
     * @param string $template
     * @param array $data [optional]
     * @return mixed
     * 
     * @throws RuntimeException
     */
    private function process(string $template, array $data = []) 
    {
        $template = $this->templatePath . $template;       
        if(!is_file($template)):
            throw new RuntimeException("The '{$template}' not found.");
        endif;
        
        ob_start();
        $this->includeScope($template, array_merge($this->attributes, $data));
        return ob_get_clean();
    }

    /**
     * Extract values and include in template.
     * @param string $template
     * @param array $data
     * @return bool
     */
    protected function includeScope(string $template, array $data):bool
    {
        if(is_readable($template)):
            extract($data);
            require $template;
            return true;
        endif;

        return false;
    }

    /**
     * 
     * @param string $templatePath
     * @return Renderer
    */
    public function setTemplatePath(string $templatePath):Renderer
    {
        if(!is_readable($template)):
            throw new RuntimeException('Template not found!');
        endif;
        
        $this->templatePath = trim($templatePath);
        return $this;
    }
    
    /**
     * @return string
    */
    public function getTemplatePath():string
    {
        return $this->templatePath;
    }

    /**
     * @param array $attributes
     * @return Renderer
    */
    public function setAttributes(array $attributes):Renderer
    {
        $this->attributes = array_map("htmlspecialchars", $attributes);
        return $this;
    }

    /**
     * @return array
    */
    public function getAttributes():array
    {
        return $this->attributes;
    }

}