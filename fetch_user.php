<?php
include('dbconnection.php');

try {
    $query = "SELECT * FROM students";
    $stmt = $connection->query($query);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $output = '';
    foreach ($users as $user) {
        $output .= '<tr>';
        $output .= '<td>' . $user['student_id'] . '</td>';
        $output .= '<td>' . $user['first_name'] . '</td>';
        $output .= '<td>' . $user['last_name'] . '</td>';
        $output .= '<td>' . $user['email'] . '</td>';
        $output .= '<td>' . $user['gender'] . '</td>';
        $output .= '<td>' . $user['user_address'] . '</td>';
        $output .= '<td>' . calculateAge($user['birthdate']) . '</td>';
        $output .= '<td>' . $user['course'] . '</td>'; // New Course Column
        $output .= '<td><img src="' . $user['profile_image'] . '" width="50"></td>';
        $output .= '<td>';
        $output .= '<button class="btn btn-primary btn-sm editBtn" data-student-id="' . $user['student_id'] . '">Edit</button>';
        $output .= '<button class="btn btn-danger btn-sm deleteBtn" data-student-id="' . $user['student_id'] . '">Delete</button>';
        $output .= '</td>';
        $output .= '</tr>';
    }

    echo $output;
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}

function calculateAge($birthdate) {
    $today = new DateTime();
    $birthDate = new DateTime($birthdate);
    $interval = $today->diff($birthDate);
    return $interval->y;
}
?>
