     <!-- Dans votre vue approved_reviews.php -->
     <h1>En attente de Moderation</h1>

<?php if (!empty($review)): ?>
    <?php foreach ($review as $rev): ?>
          <div class="review">
               <p><?= $rev["content"]?></p>
               <p>Créé le <?= $rev["created"] ?></p>
               <form method="POST" action="/unreview">
                    <input type="hidden"  value="<?php echo $rev['id']; ?>" name="id">
                    <label for="type">Choisissez le type :</label><br>

                    <input type="radio" id="approve" name="action" value="approve">
                    <label for="approve">approve</label><br>

                    <input type="radio" id="delete" name="action" value="delete">
                    <label for="delete">delete</label><br><br>

                    <input type="submit" value="Submit">
               </form>

          </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucune critique à afficher.</p>
<?php endif; ?>
