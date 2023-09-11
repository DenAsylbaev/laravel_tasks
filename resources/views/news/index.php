<?php foreach($news as $n): ?>
    
    <div style="border: 1px solid black">
        <h2><?=$n['title']?></h2>
        <p><?=$n['description']?></p>
        <div><strong><?=$n['author']?> (<?=$n['created_at']?>)</strong></div>
    </div>

<?php endforeach; ?>
