<?php

namespace wfm;

class ErrorHandler
{
    public function __construct()
    {
        error_reporting(DEBUG ? -1 : 0);
        set_exception_handler([$this, 'exceptionHandler']);
    }

    public function exceptionHandler(\Throwable $e)
    {
        
    }
    
    protected function logError(string $message = '', string $file = '', string $line = '')
    {
        file_put_contents(
            LOGS . '/errors.log',
            "[" . date('Y-m-d H:i:s') . "] Текст ошибки: {$message} | Файл: {$file} | Строка: {$line}\n=================\n",
            FILE_APPEND);
    }
    
    protected function displayError($errno, $errstr, $errfile, $errline, $response = 500)
    {
        if ($response == 0) {
            $response = 404;
        }

        http_response_code($response);
        
        if ($response == 404 && !DEBUG) {
            require WWW . '/errors/404.php';
            die;
        }
        
        if (DEBUG) {
            require WWW . '/errors/development.php';
        } else {
            require WWW . '/errors/production.php';
        }

        die;
    }
}
