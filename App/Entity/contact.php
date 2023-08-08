<?php 

namespace App\Entity;


class Contact extends Infos {
    protected ?int $id_contact = null;
    protected string $last_name;
    protected string $first_name;
    protected string $date_of_birth;
    protected string $nationality;
    protected string $code_name_contact;

    

    /**
     * Get the value of id_contact
     */
    public function getIdContact(): ?int
    {
        return $this->id_contact;
    }

    /**
     * Set the value of id_contact
     */
    public function setIdContact(?int $id_contact): self
    {
        $this->id_contact = $id_contact;

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
}