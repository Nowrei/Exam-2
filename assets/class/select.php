<?php

class projet
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function index()
    {
        $projetQuery = "SELECT * FROM projet_utilisateur";
        $result = $this->conn->query($projetQuery);
        if($result->num_rows > 0){
            return $result; 
        }else{
            return false;
        }
    }
}