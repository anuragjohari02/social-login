<?php
require_once '../app/classes/SocialAuth.php';

$provider = 'Google';
$social = new SocialAuth();

$user = $social->login($provider);

if ($user) {
    echo "<h2>Login Successful</h2>";
    // echo "<pre>";
    // print_r($_SESSION['user']);
    // echo "</pre>";
    header("Location: index.php");
} else {
    echo "Login failed!";
}