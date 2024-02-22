<!-- Dans votre vue approved_reviews.php -->

<h1>Avis approuvés</h1>
<?php foreach ($review as $rev): ?>
    <div class="review">
        <p class="review-content"><?= $rev["content"]?></p>
        <p class="review-created">Créé le <?= $rev["created"] ?></p>
    </div>
<?php endforeach; ?>
