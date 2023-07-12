
<?php
     class Acteur extends Personne {

        private array $_castings;

        
        
        public function __construct(string $nom, string $prenom, string $sexe, string $naissance) {
            parent::__construct($nom, $prenom, $sexe, $naissance);
            $this-> _castings = [];
        }


        

        
         public function getActeur(){
             return $this->_acteur;
         }

         public function setActeur( Acteur $acteur): Acteur
         {
             return $this->_acteur = $acteur;
         }

        
        public function getCasting(){
            return $this->_castings;
        }

        
         public function setFilms(array $films){
            $this -> _castings = $films;
        }


       

         public function __toString()
         {
              return $this ->getPrenom(). ' '. $this ->getNom();
         }

     

        public function addCasting (Casting $casting) {
            $this->_castings[] = $casting;

        }

        
        public function afficherFilmographie(){
            $result ="<h3> Filmographie de " . $this->getPrenom(). " " .$this->getNom() ."</h3>";
            $castings = $this->_castings;
            foreach ($castings as $casting){
                $result .= $casting."<br>";
            }
            return $result;
        }


     }


?>