<a href="<?= URI ?>admin/testimony" class="btn btn-danger">Back</a>
<a href="<?= URI ?>testimony/<?= $item->id ?>" target="_blank" class="btn btn-success">Show</a>
<h1>Edit testimony</h1>
<form method="post">
    <?= $form->input('author','Author'); ?>
    <?= $form->input('link','Link'); ?>
    <?= $form->input('content','Content',['type'=>'textarea']); ?>
    <button type="submit" class="btn btn-primary">Save changes</button>
</form>

<?php foreach ($scripts as $s): ?>
    <script type="text/javascript" src="<?= $s ?>"></script>
<?php endforeach; ?>

<script>
    $(function() {
        $('textarea').froalaEditor({
            toolbarButtons: ['undo', 'redo' , '|', 'bold', 'italic', 'underline', 'strikethrough', 'color', '|', 'subscript', 'superscript', 'outdent', 'indent', '|','clearFormatting', 'insertTable', 'html', 'code_view'],
            toolbarButtonsXS: ['undo', 'redo' , '-', 'bold', 'italic', 'underline'],
            charCounterMax: 400,
        })
    });
</script>