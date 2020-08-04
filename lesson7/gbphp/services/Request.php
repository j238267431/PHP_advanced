<?php

namespace App\services;


use Throwable;

class Request
{
    private $requestString = '';
    private $controllerName = 'auth';
    private $actionName = '';
    private $id = 0;
    private $page = 1;
    private $params = [
        'get' => array(),
        'post' => array(),
        'session' => array(),
    ];

    public function __construct()
    {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->prepareRequest();
//        $this->getError();
    }

//    protected function getError()
//    {
//        try {
//            if ($this->getId()) {
//                throw new NewException('Что-то сломал2(');
//            }
//        } catch (NewException $exception) {
//            var_dump($exception->getMessage());
//        }  catch (\Exception $exception) {
//            echo 'Exception';
//        } finally {
//            echo 'END';
//        }
//    }

    protected function prepareRequest()
    {
        // $pattern = "#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<params>.*)#ui";
        $pattern = "#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<params>.*)#ui";
        if (preg_match_all($pattern, $this->requestString, $matches)) {
            $this->controllerName = $matches['controller'][0];
            $this->actionName = $matches['action'][0];
        }

        $this->params = [
            'get' => $_GET,
            'post' => $_POST,
        ];

        if (!empty((int)$_GET['id'])){
            $this->id = $this->params['get']['id'];
        }

        // if (!empty((int)$_GET['id'])) {
        //     $this->id = (int)$_GET['id'];
        // }
        if (!empty((int)$_GET['page'])){
            $this->page = $this->params['get']['page'];
        }
        // if (!empty((int)$_GET['page'])) {
        //     $this->page = (int)$_GET['page'];
        // }
    }



    public function getPost($key = '', $defaultValue = null)
    {
        return $this->getDataByMethod('post', $key, $defaultValue);
    }
    public function getGet($key = '', $defaultValue = null)
    {
        return $this->getDataByMethod('get', $key, $defaultValue);
    }

    protected function getDataByMethod($method, $key = '', $defaultValue = null){
        if (empty($key)){
            return $this->params[$method];
        }
        if (!empty($this->params[$method][$key])){
            return $this->params[$method][$key];
        }
        return $defaultValue;
    }



    /**
     * @return string
     */
    public function getControllerName(): string
    {
        return  'App\\controllers\\' . ucfirst($this->controllerName) . 'Controller';
    }

    public function getVarController(){
        return $this->controllerName;
    }

    /**
     * @return string
     */
    public function getActionName(): string
    {
        return $this->actionName;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    public function post($value = '')
    {
        if (empty($value)) {
           return $this->params['post'];
        }
        return $this->params['post'][$value];
    }


    public function getSession($key, $defaultValue = false, $id = 0)
    {
        if(empty($key)){
            return $_SESSION;
        }
        if(!empty($_SESSION[$key]))
            return $_SESSION[$key];
        
        return $defaultValue;
    }

    public function setSession($key, $value){
        $_SESSION[$key] = $value;
    }

    public function toPath($path = '', $msg = '')
    {
       if(!empty($msg)){
           $this->setSession('msg', $msg);
       } 
       if (!empty($path)){
           header("location: {$path}");
           return;
       }
       if (isset($_SERVER['HTTP_REFERER'])){
           header("location: {$_SERVER['HTTP_REFERER']}");
           return;
       }
       header("location: /");
    }
}

//class NewException extends \Exception
//{
//    public function __construct($message = "", $code = 0, Throwable $previous = null)
//    {
//        parent::__construct($message, $code, $previous);
//        file_put_contents('test.log', $this->getMessage() . PHP_EOL, FILE_APPEND);
//    }
//}
