<?php

namespace Robbielove\LobsterName\Traits;

trait HasLobsterName
{
    
    /**
     * Return the name column for this model
     * 
     * @return mixed
     */
    public function getNameColumnAttribute()
    {
        return $this->name;
    }
    
    /**
     *  Take a first name and use the first letter
     * to make a (L)obster name
     * e.g. Sammy Sobster
     *
     * @return string
     */
    public function getLobsterNameAttribute(): string
    {
        $letter = substr($this->getNameColumnAttribute(), 0, 1);
        
        return $this->getNameColumnAttribute() . ' ' . ucfirst($letter) . 'obster';
    }
    
    /**
     *  Take a first name and use the first three letters
     * to make a dog name
     * e.g. Rob Dog
     *
     * @return string
     */
    public function getDogNameAttribute(): string
    {
        $letters = substr($this->getNameColumnAttribute(), 0, 3);
        
        return $letters . ' Dog';
    }
    
    /**
     *  Make a Doctor name
     *  e.g. Dr. Robbie
     *
     * @return string
     */
    public function getDoctorNameAttribute(): string
    {
        return 'Dr. ' . $this->getNameColumnAttribute();
    }
    
    /**
     *  Make a judge name
     *  e.g. The Honourable Judge Robbie
     *
     * @return string
     */
    public function getJudgeNameAttribute(): string
    {
        return 'The Honourable Judge ' . $this->getNameColumnAttribute();
    }
    
    /**
     *  Make a King name
     *  e.g. Your Highness Robbie
     * 
     * @return string
     */
    public function getKingNameAttribute(): string
    {
        return 'Your Highness ' . $this->getNameColumnAttribute();
    }
    
    /**
     *  Make a Queen name
     *  e.g. Your Majesty Robbie
     * 
     * @return string
     */
    public function getQueenNameAttribute(): string
    {
        return 'Your Majesty ' . $this->getNameColumnAttribute();
    }
    
    /**
     *  Get the first initial of the name
     *  e.g. R
     * 
     * @return string
     */
    public function getInitialNameAttribute(): string
    {
        return substr($this->getNameColumnAttribute(), 0, 1);
    }
    
    /**
     *  Get the backwards name
     *  e.g. eibboR
     * 
     * @return string
     */
    public function getBackwardsNameAttribute(): string
    {
        return strrev($this->getNameColumnAttribute());
    }
    /**
     *  Make a pirate name
     *  e.g. Captain Robbie
     *
     * @return string
     */
    public function getPirateNameAttribute(): string
    {
        return 'Captain ' . $this->getNameColumnAttribute();
    }

    /**
     *  Make a superhero name
     *  e.g. Super Robbie
     *
     * @return string
     */
    public function getSuperheroNameAttribute(): string
    {
        return 'Super ' . $this->getNameColumnAttribute();
    }

    /**
     *  Make a secret agent name
     *  e.g. Agent R
     *
     * @return string
     */
    public function getSecretAgentNameAttribute(): string
    {
        $initial = $this->getInitialNameAttribute();
        return 'Agent ' . $initial;
    }

    /**
     *  Make a rapper name
     *  e.g. Lil' Robbie
     *
     * @return string
     */
    public function getRapperNameAttribute(): string
    {
        return "Lil' " . $this->getNameColumnAttribute();
    }

    /**
     *  Make a space explorer name
     *  e.g. Astro Robbie
     *
     * @return string
     */
    public function getSpaceExplorerNameAttribute(): string
    {
        return 'Astro ' . $this->getNameColumnAttribute();
    }

}