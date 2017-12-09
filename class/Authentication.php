<?php

class Authentication
{
    function connect(){
        $host='localhost';
        $db='admin-dashboard';
        try
        {
            $conn=new PDO("mysql:host=$host;dbname=$db",'root','');
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}

//Object creation
$auth= new Authentication();
$auth->connect();

?>
