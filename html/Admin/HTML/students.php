<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link rel="stylesheet" href="../../styles.css">
</head>
<body>
<!-- Header -->
<header>
    <h1>Students Management</h1>
</header>

<!-- Navigation -->
<nav>
    <a href="home.php">Home</a>
    <a href="manage_registrations.php">Manage Registrations</a>
    <a href="../../Shared/logout.php">Logout</a>
</nav>

<!-- Main Content -->
<div class="container">
    <section class="students-section">
        <h2>All Students</h2>

        <table>
            <thead>
            <tr>
                <th>Student ID</th>
                <th>First Name</th>
                <th>Last Name</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include("../PHP/get_students.php");
            $result = getStudents();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["student_id"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["firstname"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["lastname"]) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3' style='text-align:center;'>No students found.</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </section>
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2025 Admin Dashboard. All rights reserved.</p>
</footer>
</body>
</html>