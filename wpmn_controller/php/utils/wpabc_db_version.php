<?php
// Fonction Version actuelle de la DB
function wpabc_db_version()
{
    $version_db = get_option('wpabc_db_version');

    #############################################################
    # Coder la logique pour obtenir la nouvelle version de la db #
    #############################################################
    $new_version = 'nouvelle_version';

    // Vérifier si la version a changé
    if ($new_version != $version_db) {
        // Mettre à jour l'option avec la nouvelle version
        update_option('wpabc_db_version', $new_version);
    }
}
?>