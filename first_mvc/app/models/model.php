<?php

class Model
{
   
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (Exception $ex) { 
            die($ex->getMessage()); 
        }
    }

    public function getList()
    {   
        $list = "SELECT id, title FROM portfolio";
        $query = $this->db->prepare($list);
        $query->execute();
        return $query->fetchAll();
    }

    public function getProject($id)
    {   
        $projects = "SELECT * FROM portfolio WHERE id=$id";
        $query = $this->db->prepare($projects);
        $query->execute();
        return $query->fetchAll();
    }

    public function getID()
    {   
        $lastID = "SELECT id FROM portfolio";
        $query = $this->db->prepare($lastID);
        $query->execute();
        return $query->fetchAll();
    }
};

