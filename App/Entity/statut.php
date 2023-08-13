<?php 

namespace App\Entity;

class Statut 
{
    protected ?int $id_statut = null;
    protected ?string $in_preparation = null;
    protected ?string $in_progress = null ;
    protected ?string $ended = null ;
    protected ?string $failure = null;
    protected string $name_code_missions;

    

    /**
     * Get the value of id_statut
     */
    public function getIdStatut(): ?int
    {
        return $this->id_statut;
    }

    /**
     * Set the value of id_statut
     */
    public function setIdStatut(?int $id_statut): self
    {
        $this->id_statut = $id_statut;

        return $this;
    }

    /**
     * Get the value of in_preparation
     */
    public function getInPreparation(): ?string
    {
        return $this->in_preparation;
    }

    /**
     * Set the value of in_preparation
     */
    public function setInPreparation(?string $in_preparation): self
    {
        $this->in_preparation = $in_preparation;

        return $this;
    }

    /**
     * Get the value of in_progress
     */
    public function getInProgress(): ?string
    {
        return $this->in_progress;
    }

    /**
     * Set the value of in_progress
     */
    public function setInProgress(?string $in_progress): self
    {
        $this->in_progress = $in_progress;

        return $this;
    }

    /**
     * Get the value of ended
     */
    public function getEnded(): ?string
    {
        return $this->ended;
    }

    /**
     * Set the value of ended
     */
    public function setEnded(?string $ended): self
    {
        $this->ended = $ended;

        return $this;
    }

    /**
     * Get the value of failure
     */
    public function getFailure(): ?string
    {
        return $this->failure;
    }

    /**
     * Set the value of failure
     */
    public function setFailure(?string $failure): self
    {
        $this->failure = $failure;

        return $this;
    }

    /**
     * Get the value of name_code_missions
     */
    public function getNameCodeMissions(): string
    {
        return $this->name_code_missions;
    }

    /**
     * Set the value of name_code_missions
     */
    public function setNameCodeMissions(string $name_code_missions): self
    {
        $this->name_code_missions = $name_code_missions;

        return $this;
    }
}