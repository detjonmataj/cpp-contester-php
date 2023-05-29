<div class="login-wrapper">
    <div>
        <h1 class="login-header">Login</h1>
        <form action="" method="POST" class="login-form">
            <?php
            require_once 'models/LoginModel.php';
            require_once 'core/FormField.php';
            /** @var $model LoginModel */
            $usernameField = new FormField($model, 'email');
            $passwordField = (new FormField($model, 'password'))->passwordField();
            echo $usernameField;
            echo $passwordField;
            ?>
            <div>
                <input type="submit" class="btn-login form-control btn btn-blue" value="Login">
            </div>
        </form>
    </div>
</div>