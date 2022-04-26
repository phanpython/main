<?php

namespace core;

class Twig
{
    private static $twig;
    private static $template;
    private static $render = [];

    public static function setTwig($nameDirectory = '')
    {
        $loader = new \Twig\Loader\FilesystemLoader($nameDirectory);
        self::$twig = new \Twig\Environment($loader);
//        echo self::$twig->render('index.php', array('the' => 'variables', 'go' => 'here'));
    }

    public static function getTwig()
    {
        return self::$twig;
    }

    public static function setLoadTemplate($fileName = '') {
        self::$template = self::$twig->loadTemplate($fileName);
    }

    public static function addVarsToArrayOfRender($arr = []) {
        self::$render = array_merge(self::$render, $arr);
    }

    public static function render() {
        echo self::$template->render(self::$render);
    }
}