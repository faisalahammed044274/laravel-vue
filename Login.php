<?php

namespace App\classes;

class Login {
    public function adminLoginCheck(){
        extract($_POST);
        $md5password = md5($password);
        $link = mysqli_connect($host='localhost',$user='root',$password='',$database='student');
        $sql = "SELECT * FROM users WHERE email = '$email' && password = '$md5password' ";
        if ($queryResult = mysqli_query($link, $sql)) {
           $user = mysqli_fetch_assoc($queryResult);
           if ($user) {
                session_start();
                $_SESSION['id']   = $user['id'];
                $_SESSION['name'] = $user['name'];

               header ('Location: dashboard.php');
           } else{
               header( 'Location: index.php');
           }

        } else {
            die ('Query Problem'.mysqli_error($link));
        }

    }

    public function logout() {
        unset($_SESSION['id']);
        unset($_SESSION['name']);
        header ('Location: index.php');

    }
}