<h1>
    <?= $item->title; ?>
</h1>
<p>
    <em>
        <?= $item->category ?>
    </em>
</p>
<p>
    <?= $item->content; ?>
</p>

<div id="disqus_thread"></div>
<script>
     var disqus_config = function () {
        this.page.url = 'http://localhost/<?=URI?>post/<?=$item->id?>'
        this.page.identifier = '<?= $item->id ?>';
        this.page.title = '<?=$item->title?>';
     };
    (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = '//devtests.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
