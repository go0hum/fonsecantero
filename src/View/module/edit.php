<?php 
$task = new TaskController();
$taskInfo = $task->get();
$status = new StatusController();
?>
<div class="container">
    <div class="row">
        <div class="col">
        <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $task = new TaskController();
                if ($error = $task->edit($taskInfo['id'])) {
                    echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
                } else {
                    echo '<script>
                        window.onload = function() {
                            window.location.href = "/home";
                        };
                    </script>';
                }
            }
            ?>
            <form method="post">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="<?=$taskInfo['title'];?>">
                </div>
                <div class="mb-3">
                    <label for="task" class="form-label">Task</label>
                    <input type="text" name="task" class="form-control" id="task" value="<?=$taskInfo['task'];?>">
                </div>
                <div class="mb-3">
                    <label for="task" class="form-label">Status</label>
                    <select name="status">
                        <?php foreach($status->all() as $stat) { ?>
                            <option value="<?=$stat['id'];?>" <?php if($stat['id'] == $taskInfo['statusid']) { echo 'selected'; } ?>><?=$stat['name'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Editar</button> | <a href="/home">Volver</a>
            </form>
        </div>
    </div>
</div>