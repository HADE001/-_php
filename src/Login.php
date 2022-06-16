<?php
function Login (){

    if(isset($_GET['logout'])) {
        session_unset();
        header('location: /login');
        die;
    }

    if(isset($_POST['submit'])){
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $db = new Databass ;
            $member = $db -> login ($_POST['username'],$_POST['password']);
            if($member){
                $_SESSION['user'] = $member;
            } 
        }
    }


    if(isset($_SESSION['user'])){
        return title('Login') .
        <<<HTML
            <div>
                you are now logined 
                <a href="/">Home</a>
            </div>
        HTML;
    }
    return title("login").
    <<<HTML
    <div> 
        <form action="/login" method="post">
            <label for="">username</label>
            <input type="text" name="username">
            <label for="">password</label>
            <input type="password" name= "password">
            <button type="submit" name="submit">Login</button>
        </form>
    </div>
    HTML;
};