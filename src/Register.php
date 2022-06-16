<?php

function Register () {

    if(isset($_POST['submit'])){
        if(
            !empty($_POST['name']) && 
            !empty($_POST['username']) && 
            !empty($_POST['password'])  
            ){
                $name = $_POST['name'];
                $username = $_POST['username'];
                $password = md5($_POST['password']);

                $db = new Databass;
                $result = $db->query("SELECT * FROM `data` WHERE `username` = '$username'");
                $member = mysqli_fetch_assoc($result);

                if(!$member){
                    $db->register($name , $username, $password);
                    return 'register success';
                };

            }
    }

    return title("Register").
    <<<HTML
    <div> Register </div>
    <div>
        <form action="/register" method="post"> 
        <label for="">name</label>
        <input type="text" name="name" id=""> 
        <br>
        <label for="">username</label>
        <input type="text" name="username" id="">
        <br>
        <label for="">password</label>
        <input type="password" name="password" id="">
        <br>
        <button type="submit" name="submit">register</button>
     </form>
    </div>

    HTML;

}
