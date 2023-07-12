<?php 


     class Realisateur extends Personne {

        private array $_films;

        
        
        public function __construct(string $nom, string $prenom, string $sexe, string $naissance) {
            parent::__construct($nom, $prenom, $sexe, $naissance);
            $this-> _films = [];
        }

       
        

        

        public function getFilms(){
            return $this->_films;
        }

        public function setFilms(array $films){
            $this -> _films = $films;
        }

        

        public function __toString(){
            return $this->getPrenom() . " " .$this->getNom();
        }

        

        

        public function addFilm (Film $films) {
            $this->_films[] = $films;

        }

        
        public function afficherFilmReal(){
            $result ="<h3> Filmograhie de " . $this->getPrenom(). " " .$this->getNom() ." : </h3>";
            $films = $this->_films;
            foreach ($films as $film){
                $result .= $film ."<br>";
            }
            return $result;
        }
     }

?>