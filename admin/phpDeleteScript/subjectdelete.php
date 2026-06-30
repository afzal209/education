<?php
include('../db/connect.php');
$subject_id=$_GET['id'];
$delete_at = date('Y-m-d H:i:s');

// Update Questions
$q2 = mysqli_query($con, "
UPDATE question q
JOIN topic t ON q.topic_id = t.id
JOIN chapter c ON t.chapter_id = c.id
SET q.status_show = 2,
    q.deleted_at = '$delete_at'
WHERE c.subject_id = '$subject_id'
");

// Update Topics
$q3 = mysqli_query($con, "
UPDATE topic t
JOIN chapter c ON t.chapter_id = c.id
SET t.status_show = 2,
    t.deleted_at = '$delete_at'
WHERE c.subject_id = '$subject_id'
");

// Update Chapters
$q4 = mysqli_query($con, "
UPDATE chapter
SET status_show = 2,
    deleted_at = '$delete_at'
WHERE subject_id = '$subject_id'
");

// Update Subject
$q5 = mysqli_query($con, "
UPDATE subject
SET status_show = 2,
    deleted_at = '$delete_at'
WHERE id = '$subject_id'
");

if ($q1 && $q2 && $q3 && $q4 && $q5) {
    mysqli_commit($con);
    header("Location: ../viewsubject.php");
    exit;
} else {
    mysqli_rollback($con);
    echo "Error: " . mysqli_error($con);
}



?>