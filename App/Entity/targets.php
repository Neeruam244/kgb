<?php 

namespace App\Entity;

class Targets {
    protected ?int $id_target = null;
    protected string $last_name;
    protected string $first_name;
    protected string $date_of_birth;
    protected string $nationality;
    protected string $code_name_target;

    

    /**
     * Get the value of id_target
     */
    public function getIdTarget(): ?int
    {
        return $this->id_target;
    }

    /**
     * Set the value of id_target
     */
    public function setIdTarget(?int $id_target): self
    {
        $this->id_target = $id_target;

        return $this;
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
}
