<?php

class mysql {
    function mysqlConnect() {
        $connection = mysqli_connect("localhost","root","aspire@123","Data");
        return $connection;
    }
    function mysqlClose($close) {
        $closeConnection = mysqli_close($close);
        return $closeConnection;
    }
}

?>
