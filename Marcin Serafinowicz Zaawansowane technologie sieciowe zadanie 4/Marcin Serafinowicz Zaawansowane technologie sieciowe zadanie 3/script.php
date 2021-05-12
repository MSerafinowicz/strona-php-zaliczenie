<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Data
{
    public function index()
    {
        $json = file_get_contents('data.json');
        $data = json_decode($json);
        return $data;
    }
}
