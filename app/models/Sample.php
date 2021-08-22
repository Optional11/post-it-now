<?php

class Sample
{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPosts()
    {
        // for test prupose needs ot be created table called posts with id and title columns
        $this->db->query("SELECT * FROM posts");

        return $this->db->resultSet();
    }
}
