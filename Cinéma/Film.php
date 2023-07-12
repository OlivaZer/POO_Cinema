
<?php

    class Film
    {
        private string $_titre;
        private int $_dateSortie;
        private int $_duree;
        private Realisateur $_realisateur;
        private string $_resume;
        private Genre $_genre;

        private array $_castings;

        public function __construct(string $titre, int $dateSortie, Realisateur $realisateur, int $duree, string $resume, Genre $genre)
        {
            $this->_titre = $titre;
            $this->_dateSortie = $dateSortie;
            $this->_duree = $duree;
            $this->_realisateur = $realisateur;
            $this->_resume = $resume;
            $this->_realisateur->addFilm($this);
            $this->_genre = $genre;
            $this->_genre->addFilm($this);
            $this->_castings = [];
        }

        //**Setter et Getter ***********************************************************************************************************
        

        public function getTitre()
        {
            return $this->_titre;
        }

        public function setTitre(string $titre)
        {
            $this->_titre = $titre;
        }

        
        public function getDateSortie(): int
        {
            return $this->_dateSortie;
        }

        public function setDateSortie(int $dateSortie)
        {
            $this->_dateSortie = $dateSortie;
        }

        
        public function getDuree()
        {
            return $this->_duree;

        }

        public function setDuree(int $duree)
        {
            $this->_duree = $duree;
        }

        
        public function getResume()
        {
            return $this->_resume;
        }

        public function setResume(string $resume)
        {
            $this->_resume = $resume;
        }

        
        //******************************************** 
        
        public function getRealisateur()
        {
            return $this->_realisateur;
        }

        public function setRealisateur(Realisateur $realisateur)
        {
            $this->_realisateur = $realisateur;
        }

        //****************************************************

        public function getGenre()
        {
            return $this->_genre;
        }

        public function setGenre(Genre $genre)
        {
            $this->_genre = $genre;
        }

        


        //**Méthode************************************************************

        //Convertir dateSortie en année
        public function dateSortie()
        {   
            //je récupère ma date au format in
            $getDate = $this->getDateSortie(); 
            //je la convertir en Timestamp Unix, la fonction a besoin des arguments suivants "mktime($heure, $minute, $seconde, $mois, $jour, $annee, $est_dst)"
            $dateTimeStamp = mktime(0, 0, 0, 1, 1, $getDate);
            //je crée ma date et la formate ma date en année
            $dateSortie = date('Y', $dateTimeStamp);
            return "Année de sortie : " . $dateSortie;
        }

        //Convertir la duree du format int en durée****************************************************************************************

        public function getDureeTime()
        {   //je recupere ma durée en minutes
            $getDate = $this->getDuree();
            //je convertis mes minutes en seconde (le calcul des dates et durées se fait à partir des timestamp unix (en seconde))
            $convertSecond = $getDate * 60;
            // Creation et formatage de la date
            $date = date('H:i', $convertSecond); 
            return "Durée : " . $date;
        }

        //Le casting

        public function addCasting($_casting)
        {
            $this->_castings[] = $_casting;
        }

        public function afficherCasting()
        {
            $result = "<b> Casting de " . $this->getTitre(). "</b><br>";
            if (count($this->_castings) == 0) {
                // message pas de casting
                $result .= "Pas de casting pour ce film !";
            } else {
                foreach ($this->_castings as $casting) {
                    $result .= $casting->getNomRole() . " est joué par " . $casting->getActeur() . " <br>";
                }
            }
            return $result;
        }


        //Affichage******************************************************************************************
        public function __toString()
        {
            return "<b>" . $this->getTitre() . "</b>
                    <br> " . $this->DateSortie() .
                    "<br> " . $this->getDureeTime() .
                    " <br> Genre : " . $this->getGenre() .
                    " <br> Réalisateur : " . $this->getRealisateur() .
                    " <br> Synopsys : " . $this->getResume() . ".<br>";
        }


    }


?>