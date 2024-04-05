<?php
require_once 'config.php';
$conn = mysqli_connect(
    'localhost', 'root', 'mysql', 'test'
);
if ($conn == false) {
    echo mysqli_connection_error();
    exit();
}
