<div class="container">
    <form class="form-login" method="post">
        <span class="material-symbols-outlined logoFormulaire">person</span>
        <h2>Connexion</h2>
        <?php $this->modal("form", $form) ?>
        <p>Vous n’avez pas de compte ? <a href="/register" class="creerCompte">Créer un compte</a></p>
        <p class="creerCompte"><a href="/forgot-pwd" >Mot de passe oublié ? </a></p>
    </form>
</div>

