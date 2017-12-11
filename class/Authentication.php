<?php
require_once 'Database.php';
class Authentication extends Database
{
   //Admin input validation
    function inputValidation($value)
    {
        $error= array(); //empty array for storing error messages
        //VALIDATING USER INPUTS
        if(!(filter_var($value['email'],FILTER_VALIDATE_EMAIL)))
        {
            $error[]="Please enter a valid email address";
        }

        //password length must be 6 character long
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

        //if user input is invalid
        if(!empty($validateArray))
        {
            return $validateArray; //return the array containing error messages
            $conn=null; //Database connection close
            exit();
        }
        else
        {
            //preparing statement for query
            $stmt=$conn->prepare("SELECT * from admin WHERE username=:username AND password=:password");

            // preparing array of user data to process
            $dataArray=array(
                'username'=>$_POST['email'],
                'password'=>$_POST['password']
            );

            //calling Database class's select function
            $result=$this->select($dataArray,$stmt);

            //checking The number of rows returned to check whether user exist or not
            if(($result->rowCount()==1))
            {
               session_start();
               $row=$result->fetch(); //fetching userdata
               $_SESSION['username']=$row['username']; //setting session variable
               header('Location: admin.php'); //redirecting to the Dashboard page
               exit();
            }
            else
            {
                $error[]="Invalid Username Or password";
                return $error;
            }
        }
    }
}

//Object creation
$auth= new Authentication();

?>
