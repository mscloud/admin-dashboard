<?php

class Authentication
{
    //Database Connection using PDO
    function connect(){
        $host='localhost';
        $db='admin-dashboard';
        try
        {
            $dbConnection=new PDO("mysql:host=$host;dbname=$db",'root','');
            $dbConnection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $dbConnection;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    //Admin input validation
    function inputValidation($value)
    {
        $error= array(); //empty array for error messages

        //VALIDATING USER INPUTS
        if(!(filter_var($value['email'],FILTER_VALIDATE_EMAIL)))
        {
            $error[]="Please enter a valid email address";
        }
        if(strlen($value['password'])<6)
        {
            $error[]="Password Must be atleast 6 character long ";
        }
        return $error;
    }

    // Login function
    function login()
    {
        $conn=$this->connect(); //fetching database connection
        $validateArray=$this->inputValidation($_POST); //Calling input validation method
        if(!empty($validateArray)) //if invalid input
        {
            return $validateArray; //return the array containing error messages
            $conn=null; //Database connection close
            exit();
        }
        else
        {
            //preparing statement for query
            $stmt=$conn->prepare("SELECT count(*) from admin WHERE username=:username AND password=:password");
            $stmt->bindParam(':username', $_POST['email']);
            $stmt->bindParam(':password', $_POST['password']);
            $stmt->execute();
            if($stmt->rowCount()==1)
            {
                echo "yeah";
            }
        }
    }
}

//Object creation
$auth= new Authentication();

?>
