<?php

$server = 'localhost';
$user = 'root';
$password = '';
$db = 'Coaching Class Management System';

$con = mysqli_connect($server,$user,$password,$db);

if($con){
    ?>
        <script>
            alert("Connection Successful");
        </script>
    <?php
}else{
    ?>
        <script>
            alert("not Successful");
        </script>
    <?php
}

?>