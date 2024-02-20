<!-- Dans votre vue approved_reviews.php -->

<h1>Ajouter un nouvel avis</h1>

<form action="/review" method="post">
    <textarea name="content" placeholder="Votre avis"></textarea>
    <input type="submit" value="Ajouter l'avis">
</form>

<h1>Avis approuvés</h1>

<?php foreach ($review as $rev): ?>
    <div class="review">
        <p><?= $rev["content"]?></p>
        <p>Créé le <?= $rev["created"] ?></p>
    </div>
<?php endforeach; ?>
