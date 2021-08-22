<?php

// namespace App\libraries;

/*
 * Base Controller
 * Loads models and views
*/

class Controller
{
    // Load model
    protected function model($model)
    {
        //require model file
        require_once "../app/models/$model.php";

        // Instantiate model
        // new Post()
        return new $model();
    }

    // load view
    protected function view($view, $data = [])
    {
        // check for the view file
        if (file_exists("../app/views/$view.php")) {
            require_once "../app/views/$view.php";
        } else {
            // view does not exist
            die("View does not exist");
        }
    }

    protected function isLoggedIn()
    {
        $userLoggedIn =  $_SESSION['user_id'] ?? false;

        return $userLoggedIn ? true : false;
    }
}
