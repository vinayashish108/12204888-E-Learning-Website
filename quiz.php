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
    <h2>Quizzes</h2>
    <?php foreach ($courses as $course): ?>
        <div class="course">
            <h3><?php echo htmlspecialchars($course['title']); ?></h3>
            <a href="quiz_detail.php?course_id=<?php echo $course['id']; ?>">Take Quiz</a>
        </div>
    <?php endforeach; ?>
</div>
<?php include 'includes/footer.php'; ?>
