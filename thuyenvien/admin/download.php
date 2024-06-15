<?php
if (!isset($_GET['file'])) {
    die('File not specified.');
}

$file = urldecode($_GET['file']);
$filePath = __DIR__ . '/' . $file;

if (!file_exists($filePath)) {
    die('File not found.');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Download File</title>
    <script>
        function deleteFile() {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'delete_file.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('file=' + encodeURIComponent('<?php echo $file; ?>'));

            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log('File deleted successfully.');
                    window.history.back();// Chuyển hướng về trang ban đầu
                } else {
                    console.log('File deletion failed.');
                }
            };
        }

        window.onload = function() {
            const link = document.createElement('a');
            link.href = '<?php echo $file; ?>';
            link.download = '<?php echo basename($file); ?>';
            document.body.appendChild(link);
            link.click();

            setTimeout(function() {
                deleteFile();
            }, 1000);

             // Wait for download to complete
             link.addEventListener('click', function() {
                deleteFile();
            });

            // If user closes the window, delete the file
            window.addEventListener('unload', function() {
                deleteFile();
            });
        };
    </script>
</head>
<body>
    <p>Preparing your download...</p>
</body>
</html>
