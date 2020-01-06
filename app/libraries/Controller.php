<?php
/**
 * Base Controller
 * Loads the models and views
 */
class Controller
{
    /**
     * Load model
     * @param string $model
     * @return mixed
     */
    public function model(string $model)
    {
        // Require model file
        require_once '../app/models/' . $model . '.php';

        // Instantiate model
        return new $model();
    }

    /**
     * Load view
     * @param $view
     * @param array $data
     */
    public function view($view, $data = [])
    {
        // Check for the view file
        if (file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        } else {
            // View does not exist
            die('View does not exist');
        }
    }
}