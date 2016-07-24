<h1>Users</h1>
<?php
$msgs = \App\App::getInstance()->getControlSession()->get('msgs');
if(\App\App::getInstance()->getControlSession()->get('msgs') === null)
    $msgs =[];

    foreach ($msgs as $msg): ?>
    <div class="alert alert-<?= $msg['type'] ?>" role="alert">
        <?= $msg['text']?>
    </div>
<?php endforeach; ?>
<a href="?p=admin.user.create" class="btn btn-success">New</a>
<table class="table table-striped">
    <thead>
    <tr>
        <td><strong>ID</strong></td>
        <td><strong>Username</strong></td>
        <td><strong>Full name</strong></td>
        <td><strong>Registration date</strong></td>
        <td><strong>Rank</strong></td>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($items as $item) :
    ?>
    <tr>
        <td><?= $item->id ?></td>
        <td><?= $item->username ?></td>
        <td><?= $item->firstname.' '.$item->lastname ?></td>
        <td><?= $item->date ?></td>
        <td><?= $item->rank ?></td>
        <td>
            <a href="?p=admin.user.edit&id=<?= $item->id ?>" class="btn btn-primary">Edit</a>
            <form action="?p=admin.user.delete" method="post" style="display: inline;">
                <input type="hidden" name="id" value="<?= $item->id ?>">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
<?php \App\App::getInstance()->getControlSession()->rm('msgs'); ?>

