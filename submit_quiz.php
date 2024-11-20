<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $answers = $_POST['answer'];
    $quiz_ids = $_POST['quiz_id'];

    foreach ($quiz_ids as $index => $quiz_id) {
        $answer = $answers[$index];
        
        // Insert quiz answer validation here, update the user's progress
        $stmt = $pdo->prepare("INSERT INTO quiz_answers (user_id, quiz_id, answer) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $quiz_id, $answer]);
    }

    // Optionally, calculate score and update progress table

    header("Location: dashboard.php");
    exit();
}
