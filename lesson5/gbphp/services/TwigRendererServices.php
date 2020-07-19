<?php

namespace App\services;

class TwigRendererServices implements IRenderer
{
    /**
     * @var \Twig\Environment
     */
    protected $twig;

    public function render($template, $params = [])
    {
        $loader = new \Twig\Loader\FilesystemLoader(
            dirname(__DIR__) . '/views/'
        );
        $this->twig = new \Twig\Environment($loader);
        $template = $template . '.twig';
        return $this->twig->render($template, $params);
    }



        
    

}