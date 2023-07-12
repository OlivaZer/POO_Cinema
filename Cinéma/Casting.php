<?php 

class Casting {

   

    private Acteur $_acteur;
    private Film $_film;
    private Role $_nomRole;

    public function __construct(Acteur $acteur, Film $film, Role $nomRole) {
        $this -> _acteur = $acteur;
        $this -> _film = $film;
        $this ->_nomRole = $nomRole;
        $this->_film->addCasting($this);
        $this->_nomRole->addCasting($this);
        $this->_acteur->addCasting($this);

    }

    //** Setter et Getter */
    
    public function getActeur(){
        return $this ->_acteur;
    }
    
    public function getFilm(){
        return $this ->_film;
    }
    
    public function getNomRole(): string
    {
        return $this->_nomRole;
    }

    public function afficherFilm()
    {
        return "<b>" . $this->getFilm()->getTitre() . "</b>";
    }


    //** Méthodes */

    //Affichage du Casting

    public function __toString(){
        return $this->getActeur() ." joue ". $this ->getNomRole(). " dans " .$this->afficherFilm(). "<br> ";
    }
  
}
?>