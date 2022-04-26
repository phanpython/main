<?php

namespace models;

use widgets\responsible\Responsible;

class ResponsiblesPreparationModel
{
    protected $author;

    public function __construct() {
        $this->author = new Responsible();

        if(isset($_POST['search_author'])) {
            $_SESSION['search_author']  = $this->processSearch($_POST['search_author']);
            $location = 'Location: ' . HTTP . '://' . '/' . NAME_WEBSITE . '/responsible-preparation';
            header($location);
            die();
        }
    }

    public function getIndexVarsToTwig():array {
        $result = [];

        if(isset($_SESSION['search_author'])) {
            $result = ['responsibles_preparation' => $this->author->searchResponsible($_SESSION['search_author'])];
            unset($_SESSION['search_author']);
        }

        return $result;
    }

    protected function processSearch($str) {
        $str = trim($str);
        $result = '';
        $prevChar = '';

        for($i = 0; $i < mb_strlen($str); $i++) {
            $char = mb_substr($str, $i, 1);

            if($char !== ' ' || $prevChar !== ' ') {
                $result .= $char;
                $prevChar = $char;
            }
        }

        return $result;
    }
}