<?php

/**
 * Class User - model for working with users
 */
class User
{

    /**
     * User registration
     */
    public static function register($login, $email, $password)
    {
        // Connecting to the database
        $db = Db::getConnection();

        // The text of the query to the database
        $sql = 'INSERT IGNORE INTO user (login, email, password) '
                . 'VALUES (:login, :email, :password)';

        // Get and return results. A prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }




    public static function checkUserData($email, $password)
    {
        // Connecting to the database
        $db = Db::getConnection();

        // The text of the query to the database
        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

        // Get and return results. A prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();

        if ($user) {
            // If the record exists, return the user id
            return $user['id'];
        }
        return false;
    }

    /**
     * Remember user
     */
    public static function auth($userId)
    {
        // Write the user ID to the session
        $_SESSION['user'] = $userId;
    }

    /**
     * Returns the user ID if it is authorized.
     */
    public static function checkLogged()
    {
        // If there is a session, return the user ID
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        return false;
    }

    public static function checkName($login)
    {
        if (strlen($login) >= 5) {
            return true;
        }
        return false;
    }

    public static function checkPasswordEqual ($password, $pass)
    {
        if ($password == $pass) {
            return true;
        }
        return false;
    }
    /**
     * Checks the name
     */
    public static function checkPassword($password)
    {
        if (preg_match("/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*/", trim($password))) {
            return true;
        }
        return false;
    }

    /**
     * Checks email
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    /**
     * Checks if the email is being used by another user
     */
    public static function checkEmailExists($email)
    {
        // Connecting to the database
        $db = Db::getConnection();

        // The text of the query to the database
        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        // Get the results. A prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    /**
     * Checks if the login is being used by another user
     */
    public static function checkLoginExists($login)
    {
        // Connecting to the database
        $db = Db::getConnection();

        // The text of the query to the database
        $sql = 'SELECT COUNT(*) FROM user WHERE login = :login';

        // Get the results. A prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    /**
     * Returns the user with the specified id
     */
    public static function getUserById($id)
    {
        // Connecting to the database
        $db = Db::getConnection();

        // The text of the query to the database
        $sql = 'SELECT * FROM user WHERE id = :id';

        // Get the results. A prepared query is used
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Indicate that we want to get data in the form of an array
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

}
