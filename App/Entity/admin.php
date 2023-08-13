<?php 

namespace App\Entity;

class Administrator
{
    protected ?int $id_admin = null;
    protected string $last_name;
    protected string $first_name;
    protected string $email;
    protected string $password;
    protected string $creation_date;

    

    /**
     * Get the value of id_admin
     */
    public function getIdAdmin(): ?int
    {
        return $this->id_admin;
    }

    /**
     * Set the value of id_admin
     */
    public function setIdAdmin(?int $id_admin): self
    {
        $this->id_admin = $id_admin;

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
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of creation_date
     */
    public function getCreationDate(): string
    {
        return $this->creation_date;
    }

    /**
     * Set the value of creation_date
     */
    public function setCreationDate(string $creation_date): self
    {
        $this->creation_date = $creation_date;

        return $this;
    }
}