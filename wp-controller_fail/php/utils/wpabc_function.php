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

    // Fonction gérant la soumission du formulaire
    function wpabc_gestion_form_version_db()
    {
        if (isset($_POST['new_version'])) {
            $new_version = sanitize_text_field($_POST['new_version']);
            update_option('wpabc_db_version', $new_version);
        }
    }

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


    //Instanciation de la classe WPABC\Main lors de l'initialisation de WP
    function wpabc_init_plugin()
    {
        $main_instance = new WPABC\main();
    }
    add_action('init', 'wpabc_init_plugin');
    
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