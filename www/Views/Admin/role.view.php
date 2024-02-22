<!-- Dans votre vue update_user_role.php -->
<h1>Mise à jour du rôle utilisateur</h1>

<?php if (!empty($users)): ?>
    <?php foreach ($users as $user): ?>
        <div class="user">
            <p>Nom d'utilisateur : <?= $user["login"] ?></p>
            <p>Email : <?= $user["email"] ?></p>
            <form action="/role" method="POST">
                <input type="hidden" name="userId" value="<?= $user['id'] ?>">
                <label for="role">Nouveau rôle :</label>
                <select name="action" id="role">
                    <option value="2">Admin</option>
                    <option value="3">Modo</option>
                    <option value="4">Utilisateur</option>
                </select>
                <button type="submit">Mettre à jour</button>
            </form>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucun utilisateur à afficher.</p>
<?php endif; ?>
