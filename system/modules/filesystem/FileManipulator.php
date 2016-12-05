<?php namespace System\Modules\Filesystem;

/*
 ===========================================================================
 = Application File System
 ===========================================================================
 =
 = Responsible for doing all the file manipulation of the application.
 = 
 */

use \ErrorException;
use \InvalidArgumentException;
use \System\Exceptions\FileNotFoundException;

use \System\Interfaces\FileInterface;

use \FilesystemIterator;
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
class FileManipulator implements FileInterface
{
	/**
     * Check a file exists.
     * @param string $path
     * @return bool
     */
    public function exists(string $path):bool
    {
        return is_readable($path);
    }
    
	/**
     * Get the contents of file.
     * @param string $path
     * @param bool $force
     * @return string
     * 
     * @throws FileNotFoundException
     */
    public function read(string $path, bool $force = true):string
    {
        $contents = '';
        
        if(($this->exists($path)) && ($force)):
            
            $handle = fopen($path, 'rb');
            
            try{
                if(flock($handle, LOCK_SH)):

                    clearstatcache(true, $path);
                    $contents = fread($handle, $this->size($path));
                    flock($handle, LOCK_UN);
                    
                endif;
            }finally{
                fclose($handle);
            }

        elseif(($this->exists($path)) && (!$force)):
            $contents = file_get_contents($path);

        else:
            throw new FileNotFoundException("File not exists in '{$path}'.");
        endif;

        return $contents;
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
    public function write(string $path, string $content, bool $force = true):bool
    {
        if(($this->exists($path)) && ($force)):
            
            $handle = fopen($path, 'wb');
            
            try{
                if(flock($handle, LOCK_EX)):

                    fwrite($handle, $content);
                    flock($handle, LOCK_UN);
                    
                endif;
            }finally{
                fclose($handle);
            }

        elseif(($this->exists($path)) && (!$force)):
            file_put_contents($path, $content, LOCK_EX);
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
    public function append(string $path, string $content, bool $force = true):bool
    {
        if(($this->exists($path)) && ($force)):
            
            $handle = fopen($path, 'ab');
            
            try{
                if(flock($handle, LOCK_EX)):

                    fwrite($handle, $content);
                    flock($handle, LOCK_UN);
                    
                endif;
            }finally{
                fclose($handle);
            }

        elseif(($this->exists($path)) && (!$force)):
            file_put_contents($path, $content, FILE_APPEND);
        else:
            throw new FileNotFoundException("File not exists in '{$path}'.");
        endif;

        return true;
    }

    /**
     * Copy a file to a new location.
     * @param string $from
     * @param string $to
     * @return bool
     * 
     * @throws FileNotFoundException
     */
    public function copy(string $from, string $to):bool
    {
        if($this->exists($path)):
            return copy($from, $to);
        endif;

        throw new FileNotFoundException("File not exists in '{$path}'.");
    }

    /**
     * Move a file to a new location.
     * @param string $from
     * @param string $to
     * @return bool
     * 
     * @throws FileNotFoundException
     */
    public function move(string $from, string $to):bool
    {
        if($this->exists($path)):
            return rename($from, $to);
        endif;

        throw new FileNotFoundException("File not exists in '{$path}'.");
    }

    /**
     * Delete the files.
     * @param string $path
     * @return bool
     * 
     * @return FileNotFoundException
     */
    public function delete(string $path):bool
    {
        if($this->exists($path)):
            return unlink($path);
        endif;

        throw new FileNotFoundException("File not exists in '{$path}'.");
    }

    /**
     * Get the file size.
     * @param string $path
     * @return int
     * 
     * @throws FileNotFoundException
     */
    public function size(string $path):int
    {
        if($this->exists($path)):
            return filesize($path);
        endif;

        throw new FileNotFoundException("File not exists in '{$path}'.");
    }

    /**
     * Returns the permissions (linux/unix) of the file.
     * @return string
     */
    public function perms(string $path):string
    {
        if($this->exists($path)):
            $perms = substr(sprintf('%o', fileperms($path)), -4);
            return (is_bool($perms))?'':$perms;
        endif;

        throw new FileNotFoundException("File not exists in '{$path}'.");
    }

    /**
     * Get the file infos.
     * @param string $path
     * @return array
     */
    public function info(string $path):array
    {
        if($this->exists($path)):
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
     * @param string $path
     * @return bool
     */
    public function isWritable(string $path):bool
    {
        if($this->exists($path)):
            return is_writable($path);
        endif;

        throw new FileNotFoundException("File not exists in '{$path}'.");
    }

    /**
     * Returns true if the File is executable.
     * @return bool
     */
    public function isExecutable(string $path):bool
    {
        if($this->exists($path)):
            return is_executable($path);
        endif;

        throw new FileNotFoundException("File not exists in '{$path}'.");
    }

    /**
     * Clear PHP internal stat cache.
     * @param string path
     * @return void
     */
    public function clearStatCache(string $path = ''):void
    {
        if(($this->exists($path)) && (!empty($path))):
            clearstatcache(true, $path);
        endif;

        clearstatcache();
    }

}