<?php foreach($categories as $n): ?>
    
    <div style="border: 1px solid black">
        <h2><?=$n['title']?></h2>
        <p><?=$n['description']?></p>
        <a href="<?=route('news.index', ['id' => $n['id']])?>">Show news</a>

    </div>

<?php endforeach; ?>