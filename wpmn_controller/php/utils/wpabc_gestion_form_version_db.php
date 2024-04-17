<?php
// Fonction gérant la soumission du formulaire
function wpabc_gestion_form_version_db()
{
    if (isset($_POST['new_version'])) {
        $new_version = sanitize_text_field($_POST['new_version']);
        update_option('wpabc_db_version', $new_version);
    }
}
?>