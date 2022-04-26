<?php

namespace widgets\authorization;

use core\DB;
use core\Twig;
use PDO;

class Authorization
{
    private $email = '';
    private $password = '';
    private $cookie = '';
    private $error = '';
    private $pdo;

    public function __construct() {
        if(!isset($_POST['auth']) && !isset($_SESSION['auth_error'])) {
            return false;
        }

        if (isset($_POST['auth'])) {
            $this->processingVars();
            $this->setVars();
            $this->authorization();
        } elseif(isset($_SESSION['auth_error'])) {
            $this->setVars();
            $this->delSessions();
        }
    }

    private function authorization() {
        $email = $this->getEmail();
        $password = $this->getPassword();

        if($this->checkEmail($email) && $this->checkPassword($password, $email) && $this->checkConfirmed($email)) {
            $this->setCookie($email);
        } else {
            $this->setError('Неверный логин или пароль!');
            $this->setSessions();
        }

        $location = 'Location: ' . HTTP . '://' . '/' . NAME_WEBSITE;

        header($location);
        die();
    }

    private function checkConfirmed($email = ''):bool {
        $pdo = $this->getPDO();
        $query = "SELECT * FROM check_confirmed(:email)";

        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':email' => $email]);

        if($stmt->fetch(PDO::FETCH_LAZY)['checkConfirmed']) {
            return false;
        }

        return true;
    }

    private function delSessions() {
        unset($_SESSION['auth_error']);
        unset($_SESSION['auth_email']);
    }

    private function setSessions() {
        $_SESSION['auth_error'] = $this->getError();
        $_SESSION['auth_email'] = $this->getEmail();
    }

    private function checkEmail($email = ''):bool {
        $pdo = $this->getPDO();
        $query = "SELECT * FROM authorization(:email)";

        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':email' => $email]);

        if(!isset($stmt->fetch(PDO::FETCH_LAZY)['authorization'])) {
            return false;
        }

        return true;
    }

    private function checkPassword($password = '', $email = '') {
        $pdo = $this->getPDO();
        $query = "SELECT * FROM get_password(:email)";

        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':email' => $email]);

        $rightPassword = $stmt->fetch(PDO::FETCH_LAZY)['get_password'];

        if(!password_verify($password, $rightPassword)) {
            return false;
        }

        return true;
    }

    private function setVars()
    {
        $this->setEmail();
        $this->setPassword();
        $this->setPDO();
        $this->setError();
        $this->setVarsToTwig();
    }

    private function setVarsToTwig() {
        Twig::addVarsToArrayOfRender([
            'auth_error' => $this->getError(),
            'auth_email' => $this->getEmail()]);
    }

    private function setCookie($email = '') {
        $pdo = $this->getPDO();
        $query = "SELECT * FROM get_id_user(:email)";

        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':email' => $email]);

        $id = $stmt->fetch()[0];

        if(isset($_POST['remember'])) {
            setcookie('user', $id, time() + 3600 * 24 * 30);
        } else {
            setcookie('user', $id, time() + 3600 * 24);
        }
    }

    private function setError($str = '') {
        if(isset($_SESSION['auth_error'])) {
            $this->error = $_SESSION['auth_error'];
        } else {
            $this->error = $str;
        }
    }

    private function getError():string {
        return $this->error;
    }

    private function setPDO() {
        $this->pdo = DB::getPDO();
    }

    private function getPDO() {
        return $this->pdo;
    }

    private function processingVars() {
        foreach ($_POST as $key => $item) {
            $_POST[$key] = htmlspecialchars(trim($item));
        }
    }

    private function setEmail() {
        if(isset($_POST['auth_email'])) {
            $this->email = $_POST['auth_email'];
        } elseif(isset($_SESSION['auth_email'])) {
            $this->email = $_SESSION['auth_email'];
        }
    }

    private function getEmail():string {
        return $this->email;
    }

    private function setPassword() {
        if(isset($_POST['password'])) {
            $this->password = $_POST['password'];
        }
    }

    private function getPassword():string {
        return $this->password;
    }
}