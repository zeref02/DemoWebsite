<?php

require ('Entity/StudentEntity.php');

class InformationModel {

    function getStudentInformation() {
        require 'credentials.php';
        //making an connection to our database
        $connection = mysqli_connect($host, $user, $pass, $database) or die(mysqli_connect_error());
        $query = "SELECT * FROM information;";
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        
        $studentArray = array();    //empty array
        
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            
            $student = new StudentEntity($id, $name, $email);
            array_push($studentArray, $student);    //pushing each student to the array
        }
        
        mysqli_close($connection);  //closing the connection
        return $studentArray;
    }
    
    function insertStudent($name, $email){
        require 'credentials.php';
        //making an connection to our database
        $connection = mysqli_connect($host, $user, $pass, $database) or die(mysqli_connect_error());
        
        $query = sprintf("INSERT INTO information (name, email)
                        VALUES ('%s', '%s')",
                        mysqli_real_escape_string($connection, $name),
                        mysqli_real_escape_string($connection, $email));
        
        mysqli_query($connection, $query) or die(mysqli_error($con));
        mysqli_close($connection);  //closing the connection
    }
    
    function deleteStudentById($id){
        require 'credentials.php';
        //making an connection to our database
        $connection = mysqli_connect($host, $user, $pass, $database) or die(mysqli_connect_error());
        $query = "DELETE FROM information WHERE id='$id'";
        mysqli_query($connection, $query) or die(mysqli_error($con));
        mysqli_close($connection);  //closing the connection
    }
}