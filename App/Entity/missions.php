<?php 

namespace App\Entity;

class Missions
{
    protected ?int $id_mission = null;
    protected int $id_admin;
    protected string $title;
    protected string $description;
    protected string $name_code_mission;
    protected string $country;
    protected string $type_of_mission;
    protected string $statut;
    protected INT $number_of_hideout;
    protected string $speciality;
    protected string $start_date;
    protected string $end_date;
    protected string $identification_code;
    protected string $code_name_contact;
    protected string $code_name_target;
    protected string $adress;
    
    

    /**
     * Get the value of id_mission
     */
    public function getIdMission(): ?int
    {
        return $this->id_mission;
    }

    /**
     * Set the value of id_mission
     */
    public function setIdMission(?int $id_mission): self
    {
        $this->id_mission = $id_mission;

        return $this;
    }

    /**
     * Get the value of id_admin
     */
    public function getIdAdmin(): int
    {
        return $this->id_admin;
    }

    /**
     * Set the value of id_admin
     */
    public function setIdAdmin(int $id_admin): self
    {
        $this->id_admin = $id_admin;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of name_code_mission
     */
    public function getNameCodeMission(): string
    {
        return $this->name_code_mission;
    }

    /**
     * Set the value of name_code_mission
     */
    public function setNameCodeMission(string $name_code_mission): self
    {
        $this->name_code_mission = $name_code_mission;

        return $this;
    }

    /**
     * Get the value of country
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * Set the value of country
     */
    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get the value of type_of_mission
     */
    public function getTypeOfMission(): string
    {
        return $this->type_of_mission;
    }

    /**
     * Set the value of type_of_mission
     */
    public function setTypeOfMission(string $type_of_mission): self
    {
        $this->type_of_mission = $type_of_mission;

        return $this;
    }

    /**
     * Get the value of statut
     */
    public function getStatut(): string
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     */
    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get the value of number_of_hideout
     */
    public function getNumberOfHideout(): INT
    {
        return $this->number_of_hideout;
    }

    /**
     * Set the value of number_of_hideout
     */
    public function setNumberOfHideout(INT $number_of_hideout): self
    {
        $this->number_of_hideout = $number_of_hideout;

        return $this;
    }

    /**
     * Get the value of speciality
     */
    public function getSpeciality(): string
    {
        return $this->speciality;
    }

    /**
     * Set the value of speciality
     */
    public function setSpeciality(string $speciality): self
    {
        $this->speciality = $speciality;

        return $this;
    }

    /**
     * Get the value of start_date
     */
    public function getStartDate(): string
    {
        return $this->start_date;
    }

    /**
     * Set the value of start_date
     */
    public function setStartDate(string $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    /**
     * Get the value of end_date
     */
    public function getEndDate(): string
    {
        return $this->end_date;
    }

    /**
     * Set the value of end_date
     */
    public function setEndDate(string $end_date): self
    {
        $this->end_date = $end_date;

        return $this;
    }

    /**
     * Get the value of identification_code
     */
    public function getIdentificationCode(): string
    {
        return $this->identification_code;
    }

    /**
     * Set the value of identification_code
     */
    public function setIdentificationCode(string $identification_code): self
    {
        $this->identification_code = $identification_code;

        return $this;
    }

    /**
     * Get the value of code_name_contact
     */
    public function getCodeNameContact(): string
    {
        return $this->code_name_contact;
    }

    /**
     * Set the value of code_name_contact
     */
    public function setCodeNameContact(string $code_name_contact): self
    {
        $this->code_name_contact = $code_name_contact;

        return $this;
    }

    /**
     * Get the value of code_name_target
     */
    public function getCodeNameTarget(): string
    {
        return $this->code_name_target;
    }

    /**
     * Set the value of code_name_target
     */
    public function setCodeNameTarget(string $code_name_target): self
    {
        $this->code_name_target = $code_name_target;

        return $this;
    }

    /**
     * Get the value of adress
     */
    public function getAdress(): string
    {
        return $this->adress;
    }

    /**
     * Set the value of adress
     */
    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }
}

