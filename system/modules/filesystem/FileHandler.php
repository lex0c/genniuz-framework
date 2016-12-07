<?php namespace System\Modules\Filesystem;

/*
 ===========================================================================
 = Application File System
 ===========================================================================
 =
 = Responsible for doing all the file manipulation of the application.
 = 
 */

use \RuntimeException;
use \FilesystemIterator;
use \InvalidArgumentException;
use \System\Exceptions\FileNotFoundException;
use \System\Interfaces\FileInterface;
use \Symfony\Component\Finder\Finder;

/**
 * File System
 * @link https://github.com/lleocastro/genniuz-framework/
 * @license (MIT) https://github.com/lleocastro/genniuz-framework/blob/master/LICENSE
 * @author Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package \System\Modules\Filesystem;
 * @copyright 2016 
 * @version 1.0.0
 */
class FileHandler //implements FileInterface
{
    /**
     * Path to the file.
     * @var string
     */
    protected $path = '';

    /**
     * Inject a the handler.
     * @var FileHandler
     */
    protected $fileHandler = null;

    /**
     * Constructor.
     * @param string $path
     * @return void
     */
    public function __construct(string $path, FileHandler $handler = null)
    {
        $this->path = $this->pathFormat($path);
        $this->fileHandler = $handler;
    }

    /**
     * Create a file.
     * @param string $filename
     * @param string $path
     * @param bool $force
     * @return bool
     */
    public function create(string $filename, string $path = '', bool $force = true):bool
    {
        $filename = $this->escaper($filename);
        $path = (empty($path)) ? $this->path : $this->pathFormat($path);
        $file = $path . str_ireplace('/', DIRECTORY_SEPARATOR, $filename);

        if((!$this->exists($filename, $path)) && ($force) && (!is_readable($file))):
            
            try{
                $handle = fopen($file, 'w+');
            }finally{
                fclose($handle);
            }

        elseif((!$this->exists($filename, $path)) && (!$force) && (!is_readable($file))):
            file_put_contents($file, '', LOCK_EX);
        else:
            throw new FileNotFoundException("This file exists in '{$path}'.");
        endif;

        return true;
    }

	/**
     * Check a file exists.
     * @param string $path
     * @return bool
     */
    public function exists(string $filename, string $path = ''):bool
    {
        $filename = $this->escaper($filename);
        $path = (empty($path)) ? $this->path : $this->pathFormat($path);
        return is_readable($path . str_ireplace('/', DIRECTORY_SEPARATOR, $filename));
    }
    
	/**
     * Get the contents of file.
     * @param string $path
     * @param bool $force
     * @return string
     * 
     * @throws FileNotFoundException
     */
    public function read(string $filename, string $path = '', bool $force = true):string
    {
        $filename = $this->escaper($filename);
        $path = (empty($path)) ? $this->path : $this->pathFormat($path);
        $file = $path . str_ireplace('/', DIRECTORY_SEPARATOR, $filename);
        $contents = '';
        
        if(($this->exists($filename, $path)) && ($force) && (is_readable($file))):
            
            $handle = fopen($file, 'rb');
            
            try{
                if(flock($handle, LOCK_SH)):

                    clearstatcache(true, $file);
                    $contents = fread($handle, $this->size($filename));
                    flock($handle, LOCK_UN);
                    
                endif;
            }finally{
                fclose($handle);
            }

        elseif(($this->exists($filename, $path)) && (!$force) && (is_readable($file))):
            $contents = file_get_contents($file);
        else:
            throw new FileNotFoundException("File not exists in '{$path}'.");
        endif;

        return $this->escaper($contents, [], false);
    }

    /**
     * Write the contents of file.
     * @param string $path
     * @param string $content
     * @param bool $force
     * @return bool
     * 
     * @throws FileNotFoundException
     */
    public function write(string $filename, string $content, string $path = '', bool $force = true):bool
    {
        $filename = $this->escaper($filename);
        $path = (empty($path)) ? $this->path : $this->pathFormat($path);
        $file = $path . str_ireplace('/', DIRECTORY_SEPARATOR, $filename);

        if(($this->exists($filename, $path)) && ($force) && (is_readable($file))):
            
            $content = $this->escaper($content, [], false);
            $handle = fopen($file, 'wb');
            
            try{
                if(flock($handle, LOCK_EX)):

                    fwrite($handle, $content);
                    flock($handle, LOCK_UN);
                    
                endif;
            }finally{
                fclose($handle);
            }

        elseif(($this->exists($filename, $path)) && (!$force) && (is_readable($file))):
            file_put_contents($file, $content, LOCK_EX);
        else:
            throw new FileNotFoundException("File not exists in '{$path}'.");
        endif;

        return true;
    }

    /**
     * Append to a file.
     * @param string $path
     * @param string $content
     * @param bool $force
     * @return bool
     * 
     * @throws FileNotFoundException
     */
    public function append(string $filename, string $content, string $path = '', bool $force = true):bool
    {
        $filename = $this->escaper($filename);
        $path = (empty($path)) ? $this->path : $this->pathFormat($path);
        $file = $path . str_ireplace('/', DIRECTORY_SEPARATOR, $filename);

        if(($this->exists($filename, $path)) && ($force) && (is_readable($file))):
            
            $content = "\n" . $this->escaper($content, [], false);
            $handle = fopen($file, 'ab');
            
            try{
                if(flock($handle, LOCK_EX)):

                    fwrite($handle, $content);
                    flock($handle, LOCK_UN);
                    
                endif;
            }finally{
                fclose($handle);
            }

        elseif(($this->exists($filename, $path)) && (!$force) && (is_readable($file))):
            file_put_contents($file, $content, FILE_APPEND);
        else:
            throw new FileNotFoundException("File not exists in '{$path}'.");
        endif;

        return true;
    }

    /**
     * Copy a file to a new location.
     * @param string $filename
     * @param string $to
     * @param string $path
     * @return bool
     * 
     * @throws FileNotFoundException
     */
    public function copy(string $filename, string $to, string $path = ''):bool
    {
        $filename = $this->escaper($filename);
        $path = (empty($path)) ? $this->path : $this->pathFormat($path);

        if($this->exists($filename, $path)):
            $from = $path . str_ireplace('/', DIRECTORY_SEPARATOR, $filename);
            $to   = str_ireplace('/', DIRECTORY_SEPARATOR, $to);

            return copy($from, $to);
        endif;

        throw new FileNotFoundException("File not exists in '{$path}'.");
    }

    /**
     * Move a file to a new location.
     * @param string $filename
     * @param string $to
     * @param string $path
     * @return bool
     * 
     * @throws FileNotFoundException
     */
    public function move(string $filename, string $to, string $path = ''):bool
    {
        $filename = $this->escaper($filename);
        $path = (empty($path)) ? $this->path : $this->pathFormat($path);

        if($this->exists($filename, $path)):
            $from = $path . str_ireplace('/', DIRECTORY_SEPARATOR, $filename);
            $to   = str_ireplace('/', DIRECTORY_SEPARATOR, $to);

            return rename($from, $to);
        endif;

        throw new FileNotFoundException("File not exists in '{$path}'.");
    }

    /**
     * Delete the file.
     * @param string $filename
     * @param string $path
     * @return bool
     * 
     * @return FileNotFoundException
     */
    public function delete(string $filename, string $path = ''):bool
    {
        $filename = $this->escaper($filename);
        $path = (empty($path)) ? $this->path : $this->pathFormat($path);

        if($this->exists($filename, $path)):
            $file = $path . str_ireplace('/', DIRECTORY_SEPARATOR, $filename);

            return unlink($file);
        endif;

        throw new FileNotFoundException("File not exists in '{$path}'.");
    }

    /**
     * Get the file size.
     * @param string $filename
     * @param string $path
     * @return int
     * 
     * @throws FileNotFoundException
     */
    public function size(string $filename, string $path = ''):int
    {
        $filename = $this->escaper($filename);
        $path = (empty($path)) ? $this->path : $this->pathFormat($path);

        if($this->exists($filename, $path)):
            $file = $path . str_ireplace('/', DIRECTORY_SEPARATOR, $filename);

            return filesize($file);
        endif;

        throw new FileNotFoundException("File not exists in '{$path}'.");
    }

    /**
     * Returns the permissions (linux/unix) of the file.
     * @param string $filename
     * @param string $path
     * @return string
     * 
     * @throws FileNotFoundException
     */
    public function perms(string $filename, string $path = ''):string
    {
        $filename = $this->escaper($filename);
        $path = (empty($path)) ? $this->path : $this->pathFormat($path);

        if($this->exists($filename, $path)):
            $file = $path . str_ireplace('/', DIRECTORY_SEPARATOR, $filename);
            
            $perms = substr(sprintf('%o', fileperms($path)), -4);       
            return (is_bool($perms))?'':$perms;
        endif;

        throw new FileNotFoundException("File not exists in '{$path}'.");
    }

    /**
     * Get the file infos.
     * @param string $filename
     * @param string $path
     * @return array
     */
    public function info(string $filename, string $path = ''):array
    {
        $filename = $this->escaper($filename);
        $path = (empty($path)) ? $this->path : $this->pathFormat($path);

        if($this->exists($filename, $path)):    
            $file = $path . str_ireplace('/', DIRECTORY_SEPARATOR, $filename);
            
            return [
                'filename'      => pathinfo($path, PATHINFO_FILENAME),
                'basename'      => pathinfo($path, PATHINFO_BASENAME),
                'dirname'       => pathinfo($path, PATHINFO_DIRNAME),
                'extension'     => pathinfo($path, PATHINFO_EXTENSION),
                'mimetype'      => finfo_file(finfo_open(FILEINFO_MIME_TYPE), $path),
                'filetype'      => filetype($path),
                'lastmodified'  => filemtime($path),
                'lastaccess'    => fileatime($path),
                'owner'         => fileowner($path),
                'group'         => filegroup($path)
            ];
        endif;

        return [];
    }

    /**
     * Get an array of all files in a directory.
     * @param string $directory
     * @return array
     */
    public function allFiles(string $directory):array
    {}

    /**
     * Determine if the given path is writable.
     * @param string $filename
     * @param string $path
     * @return bool
     *
     * @throws FileNotFoundException
     */
    public function isWritable(string $filename, string $path = ''):bool
    {
        $filename = $this->escaper($filename);
        $path = (empty($path)) ? $this->path : $this->pathFormat($path);

        if($this->exists($filename, $path)):
            $file = $path . str_ireplace('/', DIRECTORY_SEPARATOR, $filename);

            return is_writable($file);
        endif;

        throw new FileNotFoundException("File not exists in '{$path}'.");
    }

    /**
     * Returns true if the File is executable.
     * @param string $filename
     * @param string $path
     * @return bool
     *
     * @throws FileNotFoundException
     */
    public function isExecutable(string $filename, string $path = ''):bool
    {
        $filename = $this->escaper($filename);
        $path = (empty($path)) ? $this->path : $this->pathFormat($path);

        if($this->exists($filename, $path)):
            $file = $path . str_ireplace('/', DIRECTORY_SEPARATOR, $filename);

            return is_executable($file);
        endif;

        throw new FileNotFoundException("File not exists in '{$path}'.");
    }

    /**
     * Clear PHP internal stat cache.
     * @param string $filename
     * @param string $path
     * @return void
     */
    public function clearStatCache(string $filename = '',  string $path = ''):void
    {
        $filename = $this->escaper($filename);
        $path = (empty($path)) ? $this->path : $this->pathFormat($path);

        if(($this->exists($filename, $path)) && (!empty($filename))):
            $file = $path . str_ireplace('/', DIRECTORY_SEPARATOR, $filename);

            clearstatcache(true, $file);
        endif;

        clearstatcache();
    }

    /**
     * Escape the malicious scripts.
     * @param string $param
     * @param array $params
     * @param bool $stripTags
     * @return mixed
     */
    protected function escaper(string $param = '', array $params = [], bool $stripTags = true)
    {
        $param  = htmlentities($param);
        $params = array_map('htmlentities', $params);

        if((!empty($param)) && (count($params) == 0)):
            
            if($stripTags):
                return strip_tags(htmlentities($param));
            endif;
     
            return htmlentities($param);
        elseif((empty($param)) && (count($params) > 1)):
            
            if($stripTags):
                $params = array_map('htmlentities', $params);
                $params = array_map('strip_tags', $params);
                return $params;            
            endif;
            
            return array_map('htmlentities', $params);        
        endif;
    }

    /**
     * Format the path file.
     * @param string path
     * @return string
     */
    protected function pathFormat(string $path):string
    {
        $path = $this->escaper($path);
        
        if(is_dir($path)):
            if(substr($path, -1) !== '/'):
                $path .= '/';
            endif;

            return str_ireplace('/', DIRECTORY_SEPARATOR, $path);
        endif;

        throw new RuntimeException("This path '{$path}' not a dir, or not exists!");
    }

    /**
     * 
     */
    public function filter()
    { return 0; }

    /**
     * Retrieve the path.
     * @return string
     */
    public function getPath():string
    {
        return $this->path;
    }

    /**
     * Retrieve the FileHandler instance.
     * @return FileHandler
     */
    public function getHandler():FileHandler
    {
        return $this->fileHandler;
    }

    /**
     * Set a new path.
     * @param string $path
     * @return FileHandler
     */
    public function setPath(string $path):FileHandler
    {
        $this->path = $this->pathFormat($path);
        return $this;
    }

}