<?php

namespace App\classes;

class Student
{
    public function saveStudentInfo()
    {

        //method 1 == array

        $link = mysqli_connect($host = 'localhost', $user = 'root', $password = '', $database = 'student');
        $sql = "INSERT INTO tbl_students (name, email, mobile) VALUES ('$_POST[name]','$_POST[email]','$_POST[mobile]')";
        if (mysqli_query($link, $sql)) {
            return "Array method run sucessfully";
        } else {
            die("Problem" . mysqli_error($link));
        }

        // method 2 == object

        // $obj = (object)$_POST;
        // $link = mysqli_connect($host='localhost',$user='root',$password='',$database='student');
        // $sql = "INSERT INTO tbl_students ( name, email, mobile) VALUES ('$obj->name', '$obj->email', '$obj->mobile')";
        // if (mysqli_query($link, $sql)) {
        //     return "Object method run sucessfully";
        // } else{
        //     die("Problem".mysqli_error($link));
        // }

        // method 3 = extract

        //     extract($_POST);
        //     $link = mysqli_connect($host='localhost',$user='root',$password='',$database='student');
        //     $sql = "INSERT INTO tbl_students (name, email, mobile) VALUES ('$name','$email','$mobile')";
        //    if (mysqli_query($link, $sql)) {
        //        return "Extract method run sucessfully";
        //    } else{
        //        die("Problem".mysqli_error($link));
        //    }
        //{}
    }

    public function getAllStudentInfo()
    {
        $link = mysqli_connect($host = 'localhost', $user = 'root', $password = '', $database = 'student');
        $sql = "SELECT * FROM tbl_students";

        // //method 1
        // if(mysqli_query($link, $sql)){

        //     $queryResult = mysqli_query($link, $sql);

        if ($queryResult = mysqli_query($link, $sql)) {
            return $queryResult;
            ////////////////////////////////////////////////////////////
            //process to get data which is used in inde file
            // while ($student = mysqli_fetch_assoc($queryResult)){
                 
            // echo '<pre>';
            // print_r($student);
            // }
            ///////////////////////////////////////////////////////////
            
        } else {
            die("Query Problem" . mysqli_error($link));
        }
    }



    public function getStudentInfoById($id){
        $link = mysqli_connect($host = 'localhost', $user = 'root', $password = '', $database = 'student');
        $sql = "SELECT * FROM tbl_students WHERE student_id = '$id' ";

        if ($queryResult = mysqli_query($link, $sql)) {
            return $queryResult;
        } else {
            die("Query Problem" . mysqli_error($link));
        }
    }

    public function updateStudentInfo(){
        extract($_POST);
        $link = mysqli_connect($host='localhost',$user='root',$password='',$database='student');
        $sql = "UPDATE tbl_students SET name = '$name', email = '$email', mobile = '$mobile' WHERE student_id ='$id' ";
        if (mysqli_query($link, $sql)) {
            header('location:view-student.php');  
        } else {
            die ('Query Problem'.mysqli_error($link));
        } 
    }

    public function deleteStudentInfo($id){
        $link = mysqli_connect($host='localhost',$user='root',$password='',$database='student');
        $sql = "DELETE FROM tbl_students WHERE student_id = '$id' ";
        if (mysqli_query($link,$sql)) {
            header('location:view-student.php');
        }   else {
            die ('Deletion Error'.mysqli_error($link));
        }
    }

    public function searchStudentInfoBySearchText(){
        extract($_POST);
        $link = mysqli_connect($host='localhost', $user='root',$password='',$database='student');
        // $sql = "SELECT * FROM tbl_students WHERE name = '$search_text'"; // Search with Exact name
        // $sql = "SELECT * FROM tbl_students WHERE name LIKE '$search_text%'"; //First Letter position wildcards
        // $sql = "SELECT * FROM tbl_students WHERE name LIKE '%$search_text'"; // Last letter positon wildcards
        // $sql = "SELECT * FROM tbl_students WHERE name LIKE '%$search_text%'"; // Any letter positon wildcards
        $sql = "SELECT * FROM tbl_students WHERE name LIKE '%$search_text%' || email LIKE '%$search_text%' || mobile LIKE '%$search_text%'"; // Any letter positon wildcards
        if ($queryResult = mysqli_query($link, $sql)) {
            return $queryResult;
        } else {
            die ('Query Problem in search'.mysqli_error($link));
        }
    }

}