<a href="<?= URI ?>admin/post" class="btn btn-danger">Back</a>
<a href="<?= URI ?>post/<?= $item->id ?>" target="_blank" class="btn btn-success">Show</a>
<h1>Edit post</h1>
<form method="post">
    <?= $form->input('title','Title'); ?>
    <?= $form->input('content','Content',['type'=>'textarea']); ?>
    <button type="submit" class="btn btn-primary">Save changes</button>
</form>

<?php foreach ($scripts as $s): ?>
    <script type="text/javascript" src="<?= $s ?>"></script>
<?php endforeach; ?>

<script>
    $(function() {
        $('textarea').froalaEditor({
            imageUploadParam: 'image',
            // Set the image upload URL.
            imageUploadURL: 'froala/upload.php',
            // Set request type.
            imageUploadMethod: 'POST',
            // Set max image size to 5MB.
            imageMaxSize: 5 * 1024 * 1024,
            // Allow to upload PNG and JPG.
            imageAllowedTypes: ['jpeg', 'jpg', 'png'],
            // Set page size.
            imageManagerPageSize: 20,
            // Set a scroll offset (value in pixels).
            imageManagerScrollOffset: 10,
            // Set the load images request URL.
            imageManagerLoadURL: "froala/load.php",
            // Set the load images request type.
            imageManagerLoadMethod: "GET",
            // Set the delete image request URL.
            imageManagerDeleteURL: "froala/delete.php",
        })
    });
</script>