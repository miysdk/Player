<?php
$conn = mysqli_connect('localhost', 'root', '', 'player');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}