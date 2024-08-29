<div class="container">
    <div class="row">
        <div class="col">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $task = new TaskController();
                if ($error = $task->add()) {
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
                    <input type="text" value="<?=$_POST['title']??'';?>" name="title" class="form-control" id="title">
                </div>
                <div class="mb-3">
                    <label for="task" class="form-label">Task</label>
                    <input type="text" value="<?=$_POST['task']??'';?>" name="task" class="form-control" id="task">
                </div>
                <button type="submit" class="btn btn-primary">Agregar</button> | <a href="/home">Volver</a>
            </form>
        </div>
    </div>
</div>