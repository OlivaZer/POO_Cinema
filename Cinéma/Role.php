<?php 



class Role {

    private string $_nomRole;
    private array $_castings;


    public function __construct(string $nomRole){
        $this -> _nomRole = $nomRole;
        $this -> _castings = [];
    }

    // To string

    public function __toString()
    {
        return $this->getNomRole();
    }

    // GETTER & SETTERS

    

    public function getNomRole(): string
    {
        return $this->_nomRole;
    }


    public function setNomRole($nomRole)
    {
        return $this->_nomRole = $nomRole;

    }

    
    public function getCastings()
    {
        return $this->_castings;
    }


    public function setCastings($castings)
    {
       return $this->_castings = $castings;

    }


    //*Methode*/

    public function addCasting($castings)
    {
       return $this->_castings[] = $castings;

    }


}

?>