<h1>Create new User :</h1>
<?php
$msgs = \App\App::getInstance()->getControlSession()->get('msgs');

if(\App\App::getInstance()->getControlSession()->get('msgs') === null)
    $msgs =[];

foreach ($msgs as $msg): ?>
    <div class="alert alert-<?= $msg['type'] ?>" role="alert">
        <?= $msg['text']?>
    </div>
<?php
endforeach;
?>
<form method="post">
    <h2>Informations</h2>
    <?= $form->input('username','Username *', ['required' => 'required']); ?>
    <?= $form->input('firstname','First name'); ?>
    <?= $form->input('lastname','Last name'); ?>
    <?= $form->input('email','Email *', ['type'   =>  'email', 'required' => 'required']); ?>
    <?= $form->input('phone','Phone', [ 'type'      =>  'tel',
        'pattern'   =>  '^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$']); ?>
    <h2>Password</h2>
    <?= $form->input('password','Password *', ['type'   =>  'password', 'required' => 'required']); ?>
    <?= $form->input('confirmPassword','Confirm password *', ['type'   =>  'password', 'required' => 'required']); ?>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
<?php \App\App::getInstance()->getControlSession()->rm('msgs'); ?>
