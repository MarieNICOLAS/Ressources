<?php
// Fonction ajout menu admin pour configurer la version
function wpabc_add_admin_menu_db()
{
    add_menu_page(
        'Version de la Base de Données',
        'Version DB',
        'manage_options',
        'db_version_menu',
        'wpabc_db_version_page'
    );
}
?>