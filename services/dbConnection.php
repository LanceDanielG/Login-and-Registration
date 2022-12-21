<?php 
    $hostName = "localhost";
    $username = "root";
    $password = "";
    $dbName = "loginandregi";

    $connection = new mysqli($hostName,$username,$password,$dbName);

    function select($table, $where_clause, $connection){
        $sql = " SELECT * FROM " . $table . " WHERE " . $where_clause;
        $sqlQuery = $connection->query($sql);
        return $sqlQuery;
    }
?>