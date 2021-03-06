<?php
session_start();

if ($_SESSION['id'] == null) {
    header('Location: index.php');
}

require_once './vendor/autoload.php';
use App\classes\Student;
use App\classes\Login;

$message = '';
if (isset($_POST['btn'])) {
    $student = new Student();
    $message = $student->saveStudentInfo();
}
if (isset($_GET['logout'])) {
    $login = new Login();
    $login->logout();
}
?>

<a href="dashboard.php">Add Student</a> ||
<a href="view-student.php">View Student</a> ||
<a href="?logout=true">Logout</a> ||
<a href=""><?php echo $_SESSION['name']; ?></a>

<hr>




<h2><?php echo $message; ?></h2>

<form action="" method="POST">
    <table>
        <tr>
            <th>Name :</th>
            <td><input type="text" required name="name"/></td>
        </tr>
        <tr>
            <th>Email Address :</th>
            <td><input type="email" required name="email"/></td>
        </tr>
        <tr>
            <th>Mobile Number :</th>
            <td><input type="number" required name="mobile"></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" name="btn" value="submit"/></td>
        </tr>
    </table>
</form>