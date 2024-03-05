<?php 
    $hostName = "localhost";
    $userName = "root";
    $password  = "";
    $dbName    = "mobile_shop";

    //Connection
    $con = new mysqli($hostName, $userName, $password, $dbName);

    //Check connection error
    if($con->connect_error){
        die("Cannot Connect to Database".$con->connect_error);
    }
    //Database connection end


    //Validation data
    function filteration($data){
        foreach($data as $key => $value){
            $value = trim($value);
            $value = stripslashes($value);
            $value = strip_tags($value);
            $value = htmlspecialchars($value);
            
            $data[$key] = $value;
        }
        return $data;
    }

    //Select, insert, update and delete statement prepare
    function crud($qtype, $sql, $values, $datatypes){
        $con = $GLOBALS["con"];

        if ($stmt = $con->prepare($sql)) {
            $stmt->bind_param($datatypes, ...$values);
            if($stmt->execute()){
                if ($qtype === "select"){
                    $result = $stmt->get_result();
                    $stmt->close();
                    return $result;
                }else{
                    $result = $stmt->affected_rows;
                    $stmt->close();
                    return $result;
                }
            }else{
                $stmt->close();
                die("Query execution failed - ".$qtype);
            }
        }else {
            die("Query preparation failed - ".$qtype);
        }
    }
    
    //Select all record from a table
    function selectAll($table){
        $con = $GLOBALS["con"];
        $res = $con->query("SELECT * FROM $table");

        return $res;
    }
?>