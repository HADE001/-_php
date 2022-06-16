<?php
class Databass
{
    function __construct()
    {
        $this->conn = mysqli_connect("localhost", 'root', "", 'databass');
    
        if(mysqli_errno($this->conn)) {
            echo "Error" . mysqli_errno($this->conn);
            exit;
        }
    }
    
    function register ($name, $user, $password) {

        $sql = "INSERT INTO `data`(`id`, `username`, `name`, `password`) VALUES (NULL,'$user','$name','$password')";
        
        $result = mysqli_query($this->conn,$sql);
    }

    function query($sql){
        return mysqli_query($this->conn , $sql);
    }
    function getMember () {                                                                               
     return mysqli_query($this->conn,"SELECT * FROM `data`");
    }
    function login ($username , $password) {
        $password = md5($password);
        $sql = "SELECT * FROM `data` WHERE `username`= '$username' AND  `password` = '$password'";
        
        $result = mysqli_query($this->conn,$sql);
        $member = mysqli_fetch_assoc($result);
        return $member ;
    }
}
