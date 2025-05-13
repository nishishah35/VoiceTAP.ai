<?php
// register.php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name  = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pw    = $_POST['password'];

  // check duplicate
  $res = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
  if (mysqli_num_rows($res) > 0) {
    echo "<script>alert('Email already registered');window.location='forms/register.html';</script>";
    exit;
  }

  // insert
  $hash = password_hash($pw, PASSWORD_BCRYPT);
  if (mysqli_query($conn,
      "INSERT INTO users (name,email,password) VALUES ('$name','$email','$hash')"
  )) {
    echo "<script>alert('Registered!');window.location='forms/login.html';</script>";
  } else {
    echo 'Error: ' . mysqli_error($conn);
  }
}
?>
