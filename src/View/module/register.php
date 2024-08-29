<div class="container">
    <div class="row">
        <div class="col">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $user = new UserController();
                if ($error = $user->register()) {
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
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" value="<?=$_POST['name']??'';?>" name="name" class="form-control" id="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" value="<?=$_POST['email']??'';?>" name="email" class="form-control" id="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" value="<?=$_POST['password']??'';?>" name="password" class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button> | <a href="/login">Login</a>
            </form>
        </div>
    </div>
</div>