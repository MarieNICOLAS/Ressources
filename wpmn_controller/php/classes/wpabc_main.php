<?php
namespace WPABC;

class main
{
    //Constructeur de la classe
    public function __construct()
    {
        //Code
        add_action('init', array($this, 'init_function'));
    }

    //Méthode d'initialisation
    public function init_function()
    {
        // add_action('hook', array($this, 'callback_function'));
    }

}