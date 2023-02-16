<h1 class="center">Edit User</h1>

<?php
require_once 'models/User.php';
require_once 'core/FormField.php';
/**
* @var $model User
* @var $userLevels UserLevel
*/
?>

<div class="form-wrapper">

    <form action="" method="GET" class="edit-user-form" id="edit-user-form">
        <?php
        $user_id = (new FormField($model, 'user_id'))->hiddenField();
        $firstNameField = (new FormField($model, 'first_name'))->readonlyField()->requiredField()->pattern('[A-Za-z]+');
        $lastNameField = (new FormField($model, 'last_name'))->readonlyField()->requiredField()->pattern('[A-Za-z]+');
        $usernameField = (new FormField($model, 'username'))->readonlyField()->requiredField()->pattern('[A-Za-z0-9]+');
        $emailField = (new FormField($model, 'email'))->readonlyField()->requiredField()->pattern('[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$');
        $passwordField = (new FormField($model, 'password'))->readonlyField()->passwordField()->pattern('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,32}$');
        $user_level = (new FormField($model, 'user_level_id', options: $userLevels))->readonlyField()->requiredField();

        if ($model->isAdmin()) {
            $user_level = $user_level->optionField();
        }

        echo $user_id;
        echo $firstNameField;
        echo $lastNameField;
        echo $usernameField;
        echo $emailField;
        echo $passwordField;
        echo $user_level;
        ?>
        <div class="from-buttons">
            <input type="submit" class="form-control btn btn-primary" value="Edit">
            <input type="submit" class="form-control btn btn-danger" value="Back">
        </div>
    </form>

</div>