<?php 

$con = mysqli_connect("localhost","root","","admin_panel");

if(!$con){
    die('connection failed' . mysqli_connect_error());
}
    

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM students WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted successfully";
        header("Location: #deleteStudent");
        exit(0);
        
    }else{
        $_SESSION['message'] = "Student not created successfully";
        header("Location: #deleteStudent");
        exit(0);  
    }
    
}






if(isset($_POST['save_student']))
 {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email= mysqli_real_escape_string($con, $_POST['email']);
    $section = mysqli_real_escape_string($con, $_POST['section']);
    $gradelevel = mysqli_real_escape_string($con, $_POST['gradelevel']);

    $query = "INSERT INTO students (name,email,section,gradelevel) VALUES 
    ('$name','$email','$section','$gradelevel')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Student created successfully";
        header("Location: #addEmployeeModal");
        exit(0);
        
    }else{
        $_SESSION['message'] = "Student not created successfully";
        header("Location: #addEmployeeModal");
        exit(0);  
    }
 }


 if (isset($_POST['save_changes'])) {
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $section = mysqli_real_escape_string($con, $_POST['section']);
    $gradelevel = mysqli_real_escape_string($con, $_POST['gradelevel']);

    $query = "UPDATE students SET name='$name', email='$email', section='$section', gradelevel='$gradelevel' WHERE id='$student_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Update Student successfully";
        header("Location: #editEmployeeModal");
        exit(0);
        
    }else{
        $_SESSION['message'] = "Student not created successfully";
        header("Location: #editEmployeeModal");
        exit(0);  
    
        
    }
}
?>