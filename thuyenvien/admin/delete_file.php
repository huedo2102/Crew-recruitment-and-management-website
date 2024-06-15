<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['file'])) {
    $file = urldecode($_POST['file']);
    $filePath = $file;

    if (file_exists($filePath)) {
        unlink($filePath);
        echo 'File deleted successfully.';
    } else {
        echo 'File not found.';
    }
} else {
    echo 'Invalid request.';
}
