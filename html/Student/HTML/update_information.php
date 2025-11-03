<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student</title>
    <link rel="stylesheet" href="../../styles.css">
</head>

        <form method="POST" action="../PHP/update_student.php" id="studentForm">
            <input type="hidden" name="student_id" id="student_id">
            <input type="text" name="firstname" id="firstname" placeholder="First Name" required>
            <input type="text" name="lastname" id="lastname" placeholder="Last Name" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="submit" value="Submit" id="register_submit">
        </form>
