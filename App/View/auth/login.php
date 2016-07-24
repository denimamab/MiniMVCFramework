<h1>Login</h1>

<?php

use App\App;
use Core\Auth\DBAuth;
use Core\HTML\BootstrapForm;

$app = App::getInstance();

$auth = new DBAuth($app->getAuthSession());
$form = new BootstrapForm($_POST);

if($_POST)
{
    $auth->login($_POST['username'], $_POST['password']);
}

$msg = $app->getAuthSession()->get('msg');

if($msg):
    ?>
    <div class="alert alert-<?= $msg['type'] ?>" role="alert">
        <?= $msg['text']?>
    </div>
    <?php
endif;
?>

<div class="row">
    <div class="col-lg-5">
        <form method="post">
            <?= $form->input('username','Username'); ?>
            <?= $form->input('password','Password',['type'=>'password']); ?>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div><!-- ./row -->


<?php
$app->getAuthSession()->rm('msg');

