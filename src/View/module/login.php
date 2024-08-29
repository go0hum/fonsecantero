<div class="container">
    <div class="row">
        <div class="col">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $user = new UserController();
                if ($error = $user->login()) {
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
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" value="<?=$_POST['email']??'';?>" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" value="<?=$_POST['password']??'';?>" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                    Aun no tienes cuenta? <a href="/register">Registrar</a>
            </form>
        </div>
    </div>
</div>