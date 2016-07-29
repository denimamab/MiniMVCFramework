<h1>Profile</h1>
<h2>Information</h2>
<div class="row">
    <div class="col-sm-2">
        <img class="thumbnail" src="<?= $item->avatar ?>" alt="">
    </div>
    <div class="col-sm-10" >
        <h3 style="padding: 0; margin:0 0 15px 0;"><?= $item->firstname . ' ' . $item->lastname ?></h3>
        <p>Registred : <?= $item->date ?></p>
        <p>Email : <?= $item->email ?></p>
        <p>Phone : <?= $item->phone ?></p>
        <p>Rank : <?= $item->rank ?></p>
    </div>
</div>

<h2>Last posts</h2>
<div class="row">
    <?php
    if(count($posts) === 0):
        ?>
        <div class="col-sm-6 col-md-4">
            <p>No post published yet.</p>
        </div>
        <?php
    endif;
    foreach ($posts as $post) : ?>
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="..." alt="...">
                <div class="caption">
                    <h3><?= $post->title ?></h3>
                    <p><?= $post->extract ?></p>
                    <p><a href="<?= URI ?>post/<?= $post->id ?>" class="btn btn-primary" role="button">More</a></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>