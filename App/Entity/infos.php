<?php 
// Héritage - Une classe fille à une seule classe mère 
// Constructor - appeler automatiquement quand on fait le new - on doit appeler les setters dans le construct
//as 2 class avec le même nom // on ne peut pas appeler sur la même page 2 class qui on le même nom

/* Namespace - ex namespace modules\forum  ou namespace modules\chat la classe Message fait partie de cette espace de nom
spl_autoload_register(); on l'appelle une seule fois sur index.php - 
inclut automatiquement les class au lieu d'un require et avec use on peut utiliser un alias avec as */

class Infos {
    protected string $last_name;
    protected string $first_name;
    protected string $date_of_birth;
    protected string $nationality;

    /*Get the value of last_name*/
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /*Set the value of last_name*/
    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    /*Get the value of first_name*/
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /*Set the value of first_name*/
    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    /*Get the value of date_of_birth*/
    public function getDateOfBirth(): string
    {
        return $this->date_of_birth;
    }

    /*Set the value of date_of_birth*/
    public function setDateOfBirth(string $date_of_birth): self
    {
        $this->date_of_birth = $date_of_birth;

        return $this;
    }

    /*Get the value of nationality*/
    public function getNationality(): string
    {
        return $this->nationality;
    }

    /*Set the value of nationality*/
    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }
}

class Agent extends Infos {
    protected string $identification_code;
    protected string $specialities;

    public function __construct($last_name, $first_name, $date_of_birth, $identification_code, $nationality, $specialities) {
        $this->setLastName($last_name);
        $this->setFirstName($first_name);
        $this->setDateOfBirth($date_of_birth);
        $this->setIdentificationCode($identification_code);
        $this->setNationality($nationality);
        $this->setSpecialities($specialities);
        }

   /*Get the value of identification_code*/
    public function getIdentificationCode(): string
    {
        return $this->identification_code;
    }

    /*Set the value of identification_code*/
    public function setIdentificationCode(string $identification_code): self
    {
        $this->identification_code = $identification_code;

        return $this;
    }

    /*Get the value of specialities*/
    public function getSpecialities(): string
    {
        return $this->specialities;
    }

    /*Set the value of specialities*/
    public function setSpecialities(string $specialities): self
    {
        $this->specialities = $specialities;

        return $this;
    }
}

class Contact extends Infos {
    protected string $code_name_contact;

    public function getAllContact() {
        // Récupérer tous les agents depuis la base de données
        $conn = new PDO('mysql:host=' . _DB_HOST_ . ';dbname=' . _DB_NAME_, _DB_USER_, _DB_PASSWORD_);
        $stmt = $conn->prepare('SELECT * FROM contact');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

class Targets extends Infos {
    protected string $code_name_target;

    public function getAllATarget() {
        // Récupérer tous les agents depuis la base de données
        $conn = new PDO('mysql:host=' . _DB_HOST_ . ';dbname=' . _DB_NAME_, _DB_USER_, _DB_PASSWORD_);
        $stmt = $conn->prepare('SELECT * FROM targets');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get the value of last_name
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     */
    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of first_name
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     */
    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get the value of date_of_birth
     */
    public function getDateOfBirth(): string
    {
        return $this->date_of_birth;
    }

    /**
     * Set the value of date_of_birth
     */
    public function setDateOfBirth(string $date_of_birth): self
    {
        $this->date_of_birth = $date_of_birth;

        return $this;
    }

    /**
     * Get the value of nationality
     */
    public function getNationality(): string
    {
        return $this->nationality;
    }

    /**
     * Set the value of nationality
     */
    public function setNationality(string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    
}

/* interface : ingénieur qui conçoit l'appli, guide de ce qu'on doit faire, 
ensuite il faut implements l'interface dans la class et définir les méthodes dans la class */

/* trait: fonction mis à dispo et on peut les utiliser en rajoutant use */ 