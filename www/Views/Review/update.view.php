<!-- Dans votre vue approved_reviews.php -->
<h1>Modifier</h1>

     <div class="review">
          <p><?= $review["content"]?></p>
          <p>Créé le <?= $review["created"] ?></p>
          <?php $this->modal("form", $form) ?>
     </div>