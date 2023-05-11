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

    /**
     *  Make an anagram name
     *
     * @return string
     */
    public function getAnagramNameAttribute(): string
    {
        $name = $this->getNameColumnAttribute();
        $nameArray = str_split($name);
        shuffle($nameArray);
        return implode('', $nameArray);
    }

    /**
     *  Make a name with alternating uppercase and lowercase characters
     *  e.g. RoBbIe
     *
     * @return string
     */
    public function getAlternatingCaseNameAttribute(): string
    {
        $name = $this->getNameColumnAttribute();
        $nameArray = str_split($name);
        foreach ($nameArray as $index => &$character) {
            $character = $index % 2 === 0 ? strtoupper($character) : strtolower($character);
        }
        return implode('', $nameArray);
    }

    /**
     *  Make a name with a random number of exclamation marks
     *  e.g. Robbie!!!
     *
     * @return string
     */
    public function getExcitedNameAttribute(): string
    {
        $exclamations = str_repeat('!', rand(1, 5));
        return $this->getNameColumnAttribute() . $exclamations;
    }

    /**
     *  Make a name with reversed case
     *  e.g. rOBBIE
     *
     * @return string
     */
    public function getReversedCaseNameAttribute(): string
    {
        $name = $this->getNameColumnAttribute();
        $nameArray = str_split($name);
        foreach ($nameArray as &$character) {
            $character = ctype_upper($character) ? strtolower($character) : strtoupper($character);
        }
        return implode('', $nameArray);
    }

    /**
     *  Make a name with vowels replaced by a random vowel
     *  e.g. Rebbe
     *
     * @return string
     */
    public function getRandomVowelReplacedNameAttribute(): string
    {
        $vowels = ['a', 'e', 'i', 'o', 'u'];
        $name = $this->getNameColumnAttribute();
        $nameArray = str_split($name);
        foreach ($nameArray as &$character) {
            if (in_array(strtolower($character), $vowels)) {
                $randomVowel = $vowels[array_rand($vowels)];
                $character = ctype_upper($character) ? strtoupper($randomVowel) : strtolower($randomVowel);
            }
        }
        return implode('', $nameArray);
    }

    /**
     *  Make a name with a random pattern of consonants and vowels
     *  e.g. Rebco, Fimke
     *
     * @return string
     */
    public function getRandomPatternNameAttribute(): string
    {
        $vowels = ['a', 'e', 'i', 'o', 'u'];
        $consonants = range('a', 'z');
        $consonants = array_diff($consonants, $vowels);

        $nameLength = strlen($this->getNameColumnAttribute());
        $randomPatternName = '';

        for ($i = 0; $i < $nameLength; $i++) {
            $isVowel = rand(0, 1);
            $newCharacter = $isVowel ? $vowels[array_rand($vowels)] : $consonants[array_rand($consonants)];
            $randomPatternName .= $newCharacter;
        }

        return ucfirst($randomPatternName);
    }

    /**
     *  Make a palindrome name
     *  e.g. Robor, Elle
     *
     * @return string
     */
    public function getPalindromeNameAttribute(): string
    {
        $name = $this->getNameColumnAttribute();
        $reversedName = strrev($name);
        return $name . substr($reversedName, 1);
    }

    /**
     *  Generate a name using a Caesar cipher with a random shift value
     *  e.g. Tloiaa
     *
     * @return string
     */
    public function getCaesarCipherNameAttribute(): string
    {
        $name = $this->getNameColumnAttribute();
        $shift = rand(1, 25);
        $caesarCipherName = '';

        foreach (str_split($name) as $char) {
            if (ctype_alpha($char)) {
                $isUpper = ctype_upper($char);
                $base = $isUpper ? ord('A') : ord('a');
                $char = chr((ord($char) - $base + $shift) % 26 + $base);
            }
            $caesarCipherName .= $char;
        }

        return $caesarCipherName;
    }

    /**
     *  Make a name with a random emoji inserted after every character
     *  e.g. R🦄o🌈b🍩b🍦i🍉e🌮
     *
     * @return string
     */
    public function getEmojiNameAttribute(): string
    {
        $emojis = ['🦄', '🌈', '🍩', '🍦', '🍉', '🌮', '🍕', '🚀', '🌟'];
        $name = $this->getNameColumnAttribute();
        $emojiName = '';

        foreach (str_split($name) as $char) {
            $emojiName .= $char . $emojis[array_rand($emojis)];
        }

        return $emojiName;
    }

    /**
     *  Make a name with a random number of interspersed underscores
     *  e.g. R_obb_ie
     *
     * @return string
     */
    public function getUnderscoreNameAttribute(): string
    {
        $name = $this->getNameColumnAttribute();
        $underscoreName = '';

        foreach (str_split($name) as $char) {
            $underscoreName .= $char . str_repeat('_', rand(0, 2));
        }

        return rtrim($underscoreName, '_');
    }


}