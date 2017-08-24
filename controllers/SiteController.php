<?php


class SiteController
{

    /**
     * Action for the home page
     */
    public function actionIndex()
    {
        $userId = User::checkLogged();
        if ($userId) {
            // Receive information about the user from the database
            $user = User::getUserById($userId);
            $hello = $user['login'];
        } else {
            $hello = 'незнайомцю(-ка)';
        }

        // Connect the view
        require_once(ROOT . '/views/site/index.php');
        return true;
    }


}
