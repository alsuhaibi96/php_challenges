<?php
include('../database/database.php');

$pdo = new Database();
$pdo->select('user');
foreach ($pdo->result as $row) 
{
    print "<hr>" . $row['name']."<br>";

}

?>