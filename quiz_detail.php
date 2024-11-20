<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$course_id = $_GET['course_id'];

$stmt = $pdo->prepare("SELECT * FROM quizzes WHERE course_id = ?");
$stmt->execute([$course_id]);
$quizzes = $stmt->fetchAll();
?>
<?php include 'includes/header.php'; ?>
<div class="container">
    <h2>Quiz</h2>
    <form action="submit_quiz.php" method="POST">
        <?php foreach ($quizzes as $quiz): ?>
            <div class="question">
                <p><?php echo htmlspecialchars($quiz['question']); ?></p>
                <input type="hidden" name="quiz_id[]" value="<?php echo $quiz['id']; ?>">
                <input type="text" name="answer[]">
            </div>
        <?php endforeach; ?>
        <button type="submit">Submit Quiz</button>
    </form>
</div>
<?php include 'includes/footer.php'; ?>
