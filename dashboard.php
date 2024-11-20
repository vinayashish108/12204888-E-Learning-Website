<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();
?>
<?php include 'includes/header.php'; ?>
<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($user['username']); ?>!</h2>
    <p><a href="lessons.php">Start Learning</a></p>
    <p><a href="quiz.php">Take a Quiz</a></p>
    <p><a href="logout.php">Logout</a></p>
</div>
<?php include 'includes/footer.php'; ?>
