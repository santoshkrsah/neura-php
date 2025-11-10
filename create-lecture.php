<?php
require 'config.php';
if ($_SESSION['role'] != 'teacher') header('Location: dashboard.php');

if ($_POST) {
    $title = $_POST['title'];
    $scheduled_at = $_POST['scheduled_at'];
    $stream_key = bin2hex(random_bytes(10));  // Simple key
    $notes = '';  // Later JSON

    // Handle file upload
    if (isset($_FILES['notes'])) {
        $target = 'uploads/' . basename($_FILES['notes']['name']);
        if (move_uploaded_file($_FILES['notes']['tmp_name'], $target)) {
            $notes = json_encode([$target]);
        }
    }

    $stmt = $pdo->prepare("INSERT INTO lectures (title, teacher_id, stream_key, notes, scheduled_at) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$title, $_SESSION['user_id'], $stream_key, $notes, $scheduled_at]);
    header('Location: dashboard.php?success=1');
}
?>
<!-- Form HTML: Title, Date, File Upload for Notes -->
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Lecture Title" required>
    <input type="datetime-local" name="scheduled_at">
    <input type="file" name="notes" accept=".pdf">
    <button type="submit">Create</button>
</form>