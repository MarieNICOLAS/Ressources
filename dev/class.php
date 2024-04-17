<?php

class User
{
    public $pseudo;
    public $mdp;

    public function __construct($pseudo, $mdp)
    {
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
    }

    public function __toString()
    {
        return "Pseudo :" . $this->pseudo . "<br> Mot de passe" . $this->mdp;
    }
}

$user1 = new User("Myo", "mdp");
echo $user1;