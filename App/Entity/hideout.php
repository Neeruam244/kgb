<?php 

namespace App\Entity;

class Hideout
{
    public INT $id_hideout;
    public string $adress;
    public string $country;
    public string $type_of_hideout;

    

    /**
     * Get the value of id_hideout
     */
    public function getIdHideout(): INT
    {
        return $this->id_hideout;
    }

    /**
     * Set the value of id_hideout
     */
    public function setIdHideout(INT $id_hideout): self
    {
        $this->id_hideout = $id_hideout;

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
     * Get the value of type_of_hideout
     */
    public function getTypeOfHideout(): string
    {
        return $this->type_of_hideout;
    }

    /**
     * Set the value of type_of_hideout
     */
    public function setTypeOfHideout(string $type_of_hideout): self
    {
        $this->type_of_hideout = $type_of_hideout;

        return $this;
    }
}