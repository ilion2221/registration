<?php

class UserController
{
    /**
     * Action for the "Register" page
     */
    public function actionRegister()
    {
        // Variables for the form
        $login = false;
        $email = false;
        $password = false;
        $pass = false;
        $result = false;

        // Form processing
        if (isset($_POST['submit'])) {

            $login = $_POST['login'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $pass = $_POST['pass'];

            // Error flag
            $errors = false;

            // Field Validation
            if (!User::checkName($login)) {
                $errors[] = 'Логін повинен містити не менше ніж 5 символів';
            }
            if (!User::checkLoginExists($login)) {
                $errors[] = 'Такий логін уже використовується';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильний email';
            }
            if (!User::checkPasswordEqual($password, $pass))
            {
                $errors[]= 'Пароль не підтверджено';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль має містити букву в верхньому регістрі,'
                .' букву в нижньому регістрі, цифру і містити не менш ніж 8 символів';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'Такий email уже використовується';
            }
            
            if ($errors == false) {
                $result = User::register($login, $email, $password);
            }
        }

        require_once(ROOT . '/views/user/register.php');
        return true;
    }
    

    public function actionLogin()
    {
        // Variables for the form
        $email = false;
        $password = false;

        // Form processing
        if (isset($_POST['submit'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            // Error flag
            $errors = false;

            // Field Validation
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль має містити букву в верхньому регістрі,'
                    .' букву в нижньому регістрі, цифру і містити не менш ніж 8 символів';
            }

            // Check if the user exists
            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                // If the data is incorrect - show error
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // If the data is correct, remember the user (session)
                User::auth($userId);

                // Forward the user to the main page
                header("Location: /");
            }
        }

        require_once(ROOT . '/views/user/login.php');
        return true;
    }


    public function actionLogout()
    {

        session_start();

        // Delete user information from session
        unset($_SESSION["user"]);

        // Forward the user to the main page
        header("Location: /");
    }

}
