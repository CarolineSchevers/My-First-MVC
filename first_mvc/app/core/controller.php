<?php

class Controller {
    public $db = null;
    public $model = null;

    function __construct()
    {
        $this->openDatabaseConnection();
        $this->loadModel();
    }

    private function openDatabaseConnection()
    {

        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
        $this->db = new PDO('mysql:host=127.0.0.1;dbname=mvc.local', 'caroline', 'becode');
    }

    public function loadModel()
    {
        require_once '../app/models/model.php';
        // create new "model" (and pass the database connection)
        $this->model = new Model($this->db);
    }

    public function view($view, $data = []) {
        require_once '../app/views/' . $view . '.php';
    }
}
?>