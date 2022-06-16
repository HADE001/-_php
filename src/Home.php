<?php
function Home() {

    $content = '';
    $db = new Databass;
    $requrt = $db -> getMember();
    while($member = mysqli_fetch_assoc($requrt)){
        $content =  $content. 
        <<<HTML
        
        <tr class = "h1">
            <td>{$member['id']}</td>
            <td>{$member['username']}</td>
            <td>{$member['name']}</td>
            <td>{$member['password']}</td>
        </tr>
        HTML;   
    }
    $member = '';
    if(isset($_SESSION['user'])){
        $member = $_SESSION ['user']['name'];
    }
    return title("Home") . 
        <<<HTML
        <div>
            <div>{$member}</div>
            <div><a href="/login?logout">logout</a></div>
            <table>
                <thead> 
                    <th>id</th>
                    <th>username</th>
                    <th>name</th>
                    <th>password</th>
                </thead>
                <tbody> 
                    {$content}
                </tbody>
            </table>
        </div>
        
        <a href="/register">register</a>
           
        HTML;
}
