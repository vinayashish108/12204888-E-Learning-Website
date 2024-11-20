<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM courses");
$stmt->execute();
$courses = $stmt->fetchAll();
?>
<?php include 'includes/header.php'; ?>
<div class="container">
    <h2>Courses</h2>
    <?php foreach ($courses as $course): ?>
        <div class="course">
            <h3><?php echo htmlspecialchars($course['title']); ?></h3>
            <p><?php echo htmlspecialchars($course['description']); ?></p>
            <a href="lesson_detail.php?course_id=<?php echo $course['id']; ?>">Start Course</a>
        </div>
    <?php endforeach; ?>
</div>
<?php include 'includes/footer.php'; ?>
