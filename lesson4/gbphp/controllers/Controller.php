<?php

namespace App\controllers;

use App\models\User;
use App\models\Good;

abstract class Controller
{

    private $action;
    protected $actionDefault = 'all';
    abstract public function getTable($id);
    abstract public function getCntrlAll();
    abstract public function getCntrlOne($id);
    public function run($action)
    {
        $this->action = $action;
        if (empty($this->action)) {
            $this->action = $this->actionDefault;
        }

        $method = $this->action . "Action";
        if (!method_exists($this, $method)) {
            return 'Error';
        }

        return $this->$method();
    }

    protected function deleteAction()
    {
        $good = new Good;
        $good->delete();
    }

    protected function getPost()
    {
        $good = new Good;
        if($this->getId()){
            $good->id = $this->getId();
        }
        $good->name = $_POST['name'];
        $good->price = $_POST['price'];
        $good->info = $_POST['info'];
        $good->img = $_POST['image'];
        $good->save();
    }

    protected function addAction(){
        $this->getPost();
        header('location: ?c=good&a=all');
    }

    protected function changeAction()
    {
        $this->getPost();
        header('location: ?c=good&a=all');
    }
    
    protected function allAction()
    {
      $id = $this->getId();
        return $this->render(
            $this->getTable($id),
            [
               $this->getTable($id) => $this->getCntrlAll(),
               'pages' => $this->getPages()
            ]
        );
    }

    protected function getPages()
    {
        extract(Good::getCount());
        $items = ceil((int)$count/(int)Good::getPerPage());
        for ($i=1; $i<=$items; $i++){
            $pages[] = $i;
        }
        return $pages;
    } 

    protected function oneAction()
    {
        $id = $this->getId();
        return $this->render(
         $this->getTable($id),
            [
               $this->getTable($id) => $this->getCntrlOne($id),
            ]
        );
    }

    protected function getId()
    {
        $id = 0;
        if (!empty((int)$_GET['id'])) {
            $id = (int)$_GET['id'];
        }

        return $id;
    }

    protected function render($template, $params = [])
    {
        $content = $this->rendererTmpl($template, $params);
        return $this->rendererTmpl(
            'layouts/main',
            [
                'content' => $content,
                'msg' => Good::getMsg(),
            ]
        );
    }

    protected function rendererTmpl($template, $params = [])
    {
        ob_start();
        extract($params);
        include dirname(__DIR__) . '/views/' . $template . '.php';
        return ob_get_clean();
    }
}