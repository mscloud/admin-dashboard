<?php

/**
* This Database class is used for interacting with database
*/
class Database
{
    //Database Connection using PDO
    protected function connect()
    {
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

    /*Executing Select prepare statment
     This method recieve two parameters
     one is the array of data to be used and another one is prepared statement
    */

    protected function select($data,$query)
    {
        if($query->execute($data)) //executing query, if success then return the object itself;
        {
            return $query;
        }
        else
        {
            return false;
        }
    }
}

?>
