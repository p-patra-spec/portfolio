<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college_fest";
$table = "registration";

/* 1. Receive Data */
$student_name = $_POST['student_name'] ;
$roll_no = $_POST['roll_no'] ;
$stream = $_POST['stream'] ;
$phone_no = $_POST['phone_no'] ;
$email = $_POST['email'] ;
$food_preference = $_POST['food_preference'] ;
$participation_category = $_POST['participation_category'];

// Empty fields validation
if (empty($student_name) || empty($email) || empty($phone_no)) {
    echo " All required fields must be filled";
    
}

// Email validation
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo " Invalid email format";
    
}

// Phone length validation
if (strlen($phone_no) != 10) {
    echo " Phone number must contain 10 digits";
    
}


/* 3. Database Connection */
$connection = mysqli_connect($servername, $username, $password, $dbname);

if ($connection) {
    echo("Server connected succesfully");
}

/* 4. Insert Data */
if (isset($_POST['submit'])) {

    $sql = "INSERT INTO $table 
    (Student_Name, Roll_No, Stream, Phone_No, Email_ID, Food_Preference, Participation_Category)
    VALUES 
    ('$student_name', '$roll_no', '$stream', '$phone_no', '$email', '$food_preference', '$participation_category')";

    // 4. Execute query
    $marks = mysqli_query($connection, $sql);

    // 5. Result check
    if ($marks) {
        echo " Data entered successfully";
    } else {
        echo " Data not entered: " . mysqli_error($connection);
    }
}

// 6. Close connection
mysqli_close($connection);
?>