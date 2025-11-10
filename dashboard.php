<?php
require 'config.php';
if (!isset($_SESSION['user_id'])) header('Location: login.php');

$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];

// Fetch Lectures
$stmt = $pdo->prepare("SELECT * FROM lectures l JOIN users u ON l.teacher_id = u.id");
$stmt->execute();
$lectures = $stmt->fetchAll();
?>
<!DOCTYPE html>
<!-- Bootstrap HTML -->
<div class="container py-5">
    <h1>Welcome, <?php echo $_SESSION['name']; ?> (<?php echo $role; ?>)</h1>
    <?php if ($role == 'teacher'): ?>
        <a href="create-lecture.php" class="btn btn-primary mb-3">+ Create Lecture</a>
    <?php endif; ?>
    <h3>Lectures</h3>
    <div class="row">
        <?php foreach ($lectures as $lec): ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5><?php echo $lec['title']; ?></h5>
                        <p>By: <?php echo $lec['name']; ?></p>
                        <?php if ($lec['is_live']): ?>
                            <a href="join-lecture.php?id=<?php echo $lec['id']; ?>" class="btn btn-success">Join Live</a>
                        <?php else: ?>
                            <button class="btn btn-secondary" disabled>Not Live</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>