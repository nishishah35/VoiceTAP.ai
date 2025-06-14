<?php
// login.php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pw    = $_POST['password'];

  $res = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
  if ($res && mysqli_num_rows($res) === 1) {
    $user = mysqli_fetch_assoc($res);
    if (password_verify($pw, $user['password'])) {
      $_SESSION['id']    = $user['id'];
      $_SESSION['name']  = $user['name'];
      header('Location: index(2).html');
      exit;
    }
  }
  echo "<script>alert('Invalid credentials');window.location='forms/login.html';</script>";
}
?>
