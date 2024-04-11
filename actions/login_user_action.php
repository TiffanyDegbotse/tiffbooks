<?php
session_start();
include '../settings/connection.php';



if (isset($_POST['submit'])) {

    $invalidErr = "";
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM people WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['userid'] = $row['pid'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['rid']=$row['rid'];
            header('Location: ../admin/user_profile_view.php?msg=sucess');
            exit();
        } else {
            echo "<script>
            alert('Incorrect username or password. Please try again.');
            window.location.href='../index.php?error'
            </script>";
            exit;
        }
    } else {
        echo "User not registered or incorrect username or password, Please try again.";
        header('Location:../index.php?msg=User not registered or incorrect username or password, Please try again.');
        exit();
    }
} else {
    header('Location: ../settings/index.php');
    exit();
}