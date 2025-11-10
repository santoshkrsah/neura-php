<?php
require 'config.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM lectures WHERE id = ?");
$stmt->execute([$id]);
$lecture = $stmt->fetch();

if (!$lecture || !$lecture['is_live']) die('Lecture not live!');

// Start Lecture (Teacher button se PUT like, par simple form)
if ($_SESSION['role'] == 'teacher' && $_POST['start']) {
    $pdo->prepare("UPDATE lectures SET is_live = 1 WHERE id = ? AND teacher_id = ?")->execute([$id, $_SESSION['user_id']]);
    $lecture['is_live'] = 1;
}
?>
<div class="container py-4">
    <h2><?php echo $lecture['title']; ?></h2>
    <div class="row">
        <div class="col-md-8">
            <!-- Simple Live: Embed YouTube or placeholder -->
            <div id="live-video" style="width:100%; height:500px; background:#000;">
                <p>Live Stream Here (Integrate Agora later or use iframe)</p>
            </div>
            <?php if ($_SESSION['role'] == 'teacher'): ?>
                <form method="POST"><button name="start" class="btn btn-success">Start Live</button></form>
            <?php endif; ?>
        </div>
        <div class="col-md-4">
            <h4>Notes</h4>
            <?php
            $notes = json_decode($lecture['notes'], true) ?: [];
            foreach ($notes as $note): ?>
                <a href="uploads/<?php echo basename($note); ?>" class="btn btn-success" download>Download Note</a>
            <?php endforeach; ?>
        </div>
    </div>
</div>