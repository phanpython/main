<?php

namespace widgets\registration;

use core\DB;
use core\Twig;
use PDO;

class Registration
{
    private $name = '';
    private $lastname = '';
    private $patronymic = '';
    private $position = '';
    private $department = '';
    private $subdivision = '';
    private $email = '';
    private $password = '';
    private $error = '';
    private $ad = '';
    private $pdo;

    public function __construct() {
        if (isset($_POST['reg'])) {
            $this->processingVars();
            $this->setVars();
            $this->submissionOfApplicationForRegistration();
        } elseif(isset($_SESSION['reg_name'])) {
            $this->setVars();
            $this->delSessions();
        } elseif (isset($_SESSION['reg_ad'])) {
            $this->setVars();
            unset($_SESSION['reg_ad']);
        }
    }

    private function delSessions() {
        unset($_SESSION['reg_error'],
            $_SESSION['reg_name'],
            $_SESSION['reg_lastname'],
            $_SESSION['reg_patronymic'],
            $_SESSION['reg_department'],
            $_SESSION['reg_position'],
            $_SESSION['reg_email'],
            $_SESSION['reg_subdivision'],
            $_SESSION['reg_password']);
    }

    private function submissionOfApplicationForRegistration()
    {
        $email = $this->getEmail();

        if ($this->checkEmail($email)) {
            $this->setError('Данный логин уже существует!');
            $this->setSessions();
        } else {
            $query = "CALL submissionOfApplicationForRegistration(:name, :lastname, :patronymic, :email, :password, :position, :department, :subdivision)";
            $stmt = $this->getPDO()->prepare($query);
            $stmt->execute([':name' => $this->getName(),
                ':lastname' => $this->getLastname(),
                ':patronymic' => $this->getPatronymic(),
                ':email' => $email,
                ':password' => $this->getPassword(),
                ':position' => $this->getPosition(),
                ':department' => $this->getDepartment(),
                ':subdivision' => $this->getSubdivision()]);

            $_SESSION['reg_ad'] = 'true';
        }

        $location = 'Location: ' . HTTP . '://' . '/' . NAME_WEBSITE;

        header($location);
        die();
    }

    private function setSessions() {
        $_SESSION['reg_error'] = $this->getError();
        $_SESSION['reg_name'] = $this->getName();
        $_SESSION['reg_lastname'] = $this->getLastname();
        $_SESSION['reg_patronymic'] = $this->getPatronymic();
        $_SESSION['reg_department'] = $this->getDepartment();
        $_SESSION['reg_subdivision'] = $this->getSubdivision();
        $_SESSION['reg_position'] = $this->getPosition();
        $_SESSION['reg_email'] = $this->getEmail();
        $_SESSION['reg_password'] = $this->getPassword();
    }

    private function setVarsToTwig() {
        Twig::addVarsToArrayOfRender(['reg_error' => $this->getError(),
            'reg_name' => $this->getName(),
            'reg_lastname' => $this->getLastname(),
            'reg_patronymic' => $this->getPatronymic(),
            'reg_department' => $this->getDepartment(),
            'reg_subdivision' => $this->getSubdivision(),
            'reg_position' => $this->getPosition(),
            'reg_email' => $this->getEmail(),
            'reg_ad' => $this->getAd()]);
    }

    private function checkEmail($email = ''):bool {
        $pdo = $this->getPDO();
        $query = "SELECT * FROM get_email(:email)";

        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ':email' => $email]);

        if(!isset($stmt->fetch(PDO::FETCH_LAZY)['email'])) {
            return false;
        }

        return true;
    }

    private function setVars()
    {
        $this->setName();
        $this->setLastname();
        $this->setPatronymic();
        $this->setPosition();
        $this->setDepartment();
        $this->setSubdivision();
        $this->setEmail();
        $this->setPassword();
        $this->setPDO();
        $this->setAd();
        $this->setError();
        $this->setVarsToTwig();
    }

    private function processingVars() {
        foreach ($_POST as $key => $item) {
            if($key === 'reg_subdivision') {
                continue;
            }

            $_POST[$key] = htmlspecialchars(trim($item));
        }
    }

    private function setPDO() {
        $this->pdo = DB::getPDO();
    }

    private function getPDO() {
        return $this->pdo;
    }

    private function setName() {
        if(isset($_POST['reg_name'])) {
            $this->name = $_POST['reg_name'];
        } elseif(isset($_SESSION['reg_name'])) {
            $this->name = $_SESSION['reg_name'];
        }
    }

    private function getName():string {
        return $this->name;
    }

    private function setLastname() {
        if(isset($_POST['reg_lastname'])) {
            $this->lastname = $_POST['reg_lastname'];
        } elseif(isset($_SESSION['reg_lastname'])) {
            $this->lastname = $_SESSION['reg_lastname'];
        }
    }

    private function getLastname():string {
        return $this->lastname;
    }

    private function setPatronymic() {
        if(isset($_POST['reg_patronymic'])) {
            $this->patronymic = $_POST['reg_patronymic'];
        } elseif(isset($_SESSION['reg_patronymic'])) {
            $this->patronymic = $_SESSION['reg_patronymic'];
        }
    }

    private function getPatronymic():string {
        return $this->patronymic;
    }

    private function setAd() {
        if(isset($_SESSION['reg_ad'])) {
            $this->ad = $_SESSION['reg_ad'];
        }
    }

    private function getAd():string {
        return $this->ad;
    }

    private function setPosition() {
        if(isset($_POST['reg_position'])) {
            $this->position = $_POST['reg_position'];
        } elseif(isset($_SESSION['reg_position'])) {
            $this->position = $_SESSION['reg_position'];
        }
    }

    private function getPosition():string {
        return $this->position;
    }

    private function setDepartment() {
        if(isset($_POST['reg_department'])) {
            $this->department = $_POST['reg_department'];
        } elseif(isset($_SESSION['reg_department'])) {
            $this->department = $_SESSION['reg_department'];
        }
    }

    private function getDepartment():string {
        return $this->department;
    }

    private function setSubdivision() {
        if(isset($_POST['reg_subdivision'])) {
            $this->subdivision = $_POST['reg_subdivision'];
        } elseif(isset($_SESSION['reg_subdivision'])) {
            $this->subdivision = $_SESSION['reg_subdivision'];
        }
    }

    private function getSubdivision():string {
        return $this->subdivision;
    }

    private function setEmail() {
        if(isset($_POST['reg_email'])) {
            $this->email = $_POST['reg_email'];
        } elseif(isset($_SESSION['reg_email'])) {
            $this->email = $_SESSION['reg_email'];
        }
    }

    private function getEmail():string {
        return $this->email;
    }

    private function setError($error = '') {
        if(!empty($error)) {
            $this->error = $error;
        } elseif(isset($_POST['reg_error'])) {
            $this->error = $_POST['reg_error'];
        } elseif(isset($_SESSION['reg_error'])) {
            $this->error = $_SESSION['reg_error'];
        }
    }

    private function getError():string {
        return $this->error;
    }

    private function setPassword() {
        if(isset($_POST['reg_email'])) {
            $this->password = password_hash($_POST['reg_password'], PASSWORD_DEFAULT);
        } elseif(isset($_SESSION['reg_password'])) {
            $this->password = password_hash($_SESSION['reg_password'], PASSWORD_DEFAULT);
        }
    }

    private function getPassword():string {
        return $this->password;
    }
}