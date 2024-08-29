<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $task = new TaskController();
    if ($task->delete()) {
        echo '<script>
            window.onload = function() {
                window.location.href = "/home";
            };
        </script>';
    }
}
?>