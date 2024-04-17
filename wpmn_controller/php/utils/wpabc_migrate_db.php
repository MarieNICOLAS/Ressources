<?php
// Fonction faisant la migration si nécessaire
function wpabc_migrate_db()
{
    // Récupérer la version actuelle
    $version_db = get_option('wpabc_db_version');

    // Chemin vers le dossier de migration
    $wpabc_path_script_migrate = plugin_dir_path(__FILE__) . 'databases/migrates/';

    // Compter le nombre de fichiers de migration
    $migrate_files = glob($wpabc_path_script_migrate . '*.sql');
    $nb_migrate_files = count($migrate_files);

    // Comparer les versions
    if ($version_db < $nb_migrate_files) {
        // Exécuter les scripts manquants à l'installation
        for ($i = $version_db + 1; $i <= $nb_migrate_files; $i++) {
            // Lire le contenu du script SQL
            $script_migration = file_get_contents($migrate_files[$i - 1]);

            #######################################
            #           exécuter script SQL        #
            #######################################

            // Mettre à jour la version de la base de données dans l'option
            update_option('wpabc_db_version', $i);
        }
    }
}
?>