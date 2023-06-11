<?php
$servername2 ='mysql:host=localhost;';
$username ='root' ;
$password = '';
$options = [];

$connection = new PDO($servername2, $username, $password,$options);

$servername = 'mysql:host=localhost;dbname=web';

// Create connection
$connection = new PDO($servername, $username, $password,$options);