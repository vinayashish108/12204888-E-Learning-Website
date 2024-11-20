<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$course_id = $_GET['course_id'];

$stmt = $pdo->prepare("SELECT * FROM lessons WHERE course_id = ?");
$stmt->execute([$course_id]);
$lessons = $stmt->fetchAll();
?>
<?php include 'includes/header.php'; ?>
<div class="container">
    <h2>Lessons</h2>
    <?php foreach ($lessons as $lesson): ?>
        <div class="lesson">
            <h3><?php echo htmlspecialchars($lesson['title']); ?></h3>
            <p><?php echo htmlspecialchars($lesson['content']); ?></p>
        </div>
    <?php endforeach; ?>
</div>
<?php include 'includes/footer.php'; ?>
