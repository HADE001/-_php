<?php
class Databass
{
    function __construct()
    {
        $this->conn = mysqli_connect("localhost", 'root', "", 'database');
    }

    function register ($name, $user, $password) {

        $sql = "INSERT INTO `data`(`id`, `username`, `name`, `password`) VALUES (NULL,'$user','$name','$password')";
        
        $result = mysqli_query($this->conn,$sql);
    }
}
