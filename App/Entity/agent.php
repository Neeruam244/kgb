<?php 

namespace App\Entity;

class Agent {
    protected ?int $id_agent = null;
    protected string $last_name;
    protected string $first_name;
    protected string $date_of_birth;
    protected string $nationality;
    protected string $identification_code;
    protected string $specialities;

    /**
     * Get the value of id_agent
     */
    public function getIdAgent(): ?int
    {
        return $this->id_agent;
    }

    /**
     * Set the value of id_agent
     */
    public function setIdAgent(?int $id_agent): self
    {
        $this->id_agent = $id_agent;

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
     * Get the value of specialities
     */
    public function getSpecialities(): string
    {
        return $this->specialities;
    }

    /**
     * Set the value of specialities
     */
    public function setSpecialities(string $specialities): self
    {
        $this->specialities = $specialities;

        return $this;
    }
}

