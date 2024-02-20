<!-- Dans votre vue approved_reviews.php -->
<h1>Avis en attente d'aprobation</h1>

<?php foreach ($review as $rev): ?>
    <div class="review">
        <p><?= $rev["content"]?></p>
        <p>Créé le <?= $rev["created"] ?></p>
    </div>
<?php endforeach; ?>
