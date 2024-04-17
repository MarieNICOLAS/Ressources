<?php
// Fonction affichage de la page de configuration
function wpabc_db_version_page()
{
    ?>
    <div class="wrap">
        <h2>Configurer la version de la Base de Données</h2>
        <form action="" method="post">
            <?php
            // Récupération de la version actuelle
            $version_db = get_option('wpabc_db_version');
            ?>
            <label for="new_version">Nouvelle version de la base de données :</label>
            <input type="text" id="new_version" name="new_version" value="<?php echo esc_attr($version_db); ?>" />
            <p>Entrez la nouvelle version de la base de données</p>
            <input type="submit" class="button-primary" value="Enregistrer" />
        </form>
    </div>
    <?php
}
?>