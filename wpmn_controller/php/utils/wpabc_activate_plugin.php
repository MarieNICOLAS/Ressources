<?php
// Fonction activation plugin
function wpabc_activate_plugin()
{
    // Vérifier si l'option de version de la base de données n'existe pas
    if (false === get_option('wpabc_db_version')) {
        // Si elle n'existe pas, créez l'option avec une valeur par défaut
        add_option('wpabc_db_version', '1.0'); // Vous pouvez initialiser à la version que vous souhaitez
    }
}
?>