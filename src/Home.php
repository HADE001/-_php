<?php
function Home() {
    $db = new Databass;
    
    $db->register('name','user','password');
    return title("Home") . 
        <<<HTML
        
           
        HTML;
}
