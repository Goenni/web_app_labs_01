<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Registrations</title>
    <link rel="stylesheet" href="../../styles.css">
</head>
<body>
<!-- Header -->
<header>
    <h1>Manage Registrations</h1>
</header>

<!-- Navigation -->
<nav>
    <a href="home.php">Home</a>
    <a href="students.php">Students</a>
    <a href="../../Shared/logout.php">Logout</a>
</nav>

<!-- Main Content -->
<div class="container">
    <section class="registrations-section">
        <h2>Pending Course Registrations</h2>

        <table>
            <thead>
            <tr>
                <th>Student ID</th>
                <th>Course Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include("../PHP/get_registrations.php");
            $result = getRegistrations();
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["student_id"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["course_name"]) . "</td>";
                    echo "<td class='action-buttons'>
                                    <form method='POST' action='../PHP/approve_registration.php' style='display:inline;'>
                                        <input type='hidden' name='course_id' value='" . htmlspecialchars($row["course_id"]) . "'>
                                        <button type='submit' class='btn-approve'>Approve</button>
                                    </form>
                                    <form method='POST' action='../PHP/reject_registration.php' style='display:inline;'>
                                        <input type='hidden' name='course_id' value='" . htmlspecialchars($row["course_id"]) . "'>
                                        <button type='submit' class='btn-reject'>Reject</button>
                                    </form>
                                  </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3' style='text-align:center;'>No pending registrations found.</td></tr>";
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