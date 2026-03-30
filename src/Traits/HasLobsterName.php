<?php

namespace Robbielove\LobsterName\Traits;

trait HasLobsterName
{
    /**
     * Override this in your model to use a different column.
     *
     * protected string $lobsterNameColumn = 'first_name';
     */

    /**
     * Get the name value used for all name generation.
     */
    public function getLobsterSourceName(): string
    {
        $column = $this->lobsterNameColumn ?? 'name';

        return $this->getAttribute($column) ?? '';
    }

    // ─── The OGs ─────────────────────────────────────────────

    /**
     * Lobster name: Sammy Sobster
     */
    public function getLobsterNameAttribute(): string
    {
        $name = $this->getLobsterSourceName();
        $letter = mb_substr($name, 0, 1);

        return $name . ' ' . mb_strtoupper($letter) . 'obster';
    }

    /**
     * Dog name: Rob Dog
     */
    public function getDogNameAttribute(): string
    {
        return mb_substr($this->getLobsterSourceName(), 0, 3) . ' Dog';
    }

    /**
     * Doctor name: Dr. Robbie
     */
    public function getDoctorNameAttribute(): string
    {
        return 'Dr. ' . $this->getLobsterSourceName();
    }

    /**
     * Judge name: The Honourable Judge Robbie
     */
    public function getJudgeNameAttribute(): string
    {
        return 'The Honourable Judge ' . $this->getLobsterSourceName();
    }

    /**
     * King name: Your Highness, Robbie
     */
    public function getKingNameAttribute(): string
    {
        return 'Your Highness, ' . $this->getLobsterSourceName();
    }

    /**
     * Queen name: Your Majesty, Robbie
     */
    public function getQueenNameAttribute(): string
    {
        return 'Your Majesty, ' . $this->getLobsterSourceName();
    }

    /**
     * Initial: R
     */
    public function getInitialNameAttribute(): string
    {
        return mb_strtoupper(mb_substr($this->getLobsterSourceName(), 0, 1));
    }

    /**
     * Backwards name: eibboR
     */
    public function getBackwardsNameAttribute(): string
    {
        return strrev($this->getLobsterSourceName());
    }

    // ─── The New Crew ────────────────────────────────────────

    /**
     * Pirate name: Captain Robbie Blacktide
     */
    public function getPirateNameAttribute(): string
    {
        $suffixes = ['Blacktide', 'Redbeard', 'Saltfang', 'Ironhook', 'Stormborn', 'Deadwind', 'Sharktooth', 'Bonecrusher'];

        return 'Captain ' . $this->getLobsterSourceName() . ' ' . $this->pickFromName($suffixes);
    }

    /**
     * Ninja name: Shadow Robbie
     */
    public function getNinjaNameAttribute(): string
    {
        $prefixes = ['Shadow', 'Silent', 'Ghost', 'Phantom', 'Whisper', 'Viper', 'Eclipse', 'Smoke'];

        return $this->pickFromName($prefixes) . ' ' . $this->getLobsterSourceName();
    }

    /**
     * Wizard name: Robbie the Magnificent
     */
    public function getWizardNameAttribute(): string
    {
        $titles = ['the Magnificent', 'the Wise', 'the Arcane', 'the Eternal', 'the Unbroken', 'Spellweaver', 'Starfire', 'the Grey'];

        return $this->getLobsterSourceName() . ' ' . $this->pickFromName($titles);
    }

    /**
     * Rapper name: Lil Robbie
     */
    public function getRapperNameAttribute(): string
    {
        $prefixes = ['Lil', 'MC', 'Yung', 'Big', 'DJ', 'Notorious', 'Lil Yung', 'A$AP'];

        return $this->pickFromName($prefixes) . ' ' . $this->getLobsterSourceName();
    }

    /**
     * Spy name: Agent R
     */
    public function getSpyNameAttribute(): string
    {
        $initial = mb_strtoupper(mb_substr($this->getLobsterSourceName(), 0, 1));

        return 'Agent ' . $initial;
    }

    /**
     * Chef name: Chef Robbie
     */
    public function getChefNameAttribute(): string
    {
        return 'Chef ' . $this->getLobsterSourceName();
    }

    /**
     * Wrestler name: The Robster
     */
    public function getWrestlerNameAttribute(): string
    {
        $name = $this->getLobsterSourceName();
        $short = mb_substr($name, 0, 3);

        return 'The ' . $short . 'ster';
    }

    /**
     * Viking name: Robbie the Bold
     */
    public function getVikingNameAttribute(): string
    {
        $titles = ['the Bold', 'the Fearless', 'Bloodaxe', 'Ironside', 'the Ruthless', 'Thunderfist', 'Skulltaker', 'the Berserker'];

        return $this->getLobsterSourceName() . ' ' . $this->pickFromName($titles);
    }

    /**
     * Superhero name: The Incredible Robbie
     */
    public function getSuperheroNameAttribute(): string
    {
        $adjectives = ['Incredible', 'Amazing', 'Invincible', 'Mighty', 'Spectacular', 'Unstoppable', 'Cosmic', 'Ultimate'];

        return 'The ' . $this->pickFromName($adjectives) . ' ' . $this->getLobsterSourceName();
    }

    /**
     * Villain name: Robbie the Destroyer
     */
    public function getVillainNameAttribute(): string
    {
        $titles = ['the Destroyer', 'the Terrible', 'Doomclaw', 'Darkblade', 'the Merciless', 'Nightshade', 'Voidwalker', 'the Undying'];

        return $this->getLobsterSourceName() . ' ' . $this->pickFromName($titles);
    }

    /**
     * Cowboy name: Robbie "Quick Draw" McGraw
     */
    public function getCowboyNameAttribute(): string
    {
        $nicknames = ['Quick Draw', 'Dead Eye', 'Six Shot', 'Dusty', 'Lone Star', 'Sidewinder', 'Buckaroo', 'Sundown'];
        $surnames = ['McGraw', 'Cassidy', 'Holliday', 'Oakley', 'McCoy', 'Dalton', 'Ringo', 'Earp'];

        return $this->getLobsterSourceName() . ' "' . $this->pickFromName($nicknames) . '" ' . $this->pickFromName($surnames);
    }

    /**
     * Rockstar name: Robbie Thunderstrike
     */
    public function getRockstarNameAttribute(): string
    {
        $surnames = ['Thunderstrike', 'Vicious', 'Rotten', 'Mayhem', 'Havoc', 'Blaze', 'Riot', 'Shred'];

        return $this->getLobsterSourceName() . ' ' . $this->pickFromName($surnames);
    }

    /**
     * Mafia name: Robbie "The Lobster" Love
     */
    public function getMafiaNameAttribute(): string
    {
        $nicknames = ['The Lobster', 'The Hammer', 'Ice Pick', 'Two Times', 'The Bull', 'No Nose', 'Lucky', 'The Fixer'];

        return $this->getLobsterSourceName() . ' "' . $this->pickFromName($nicknames) . '"';
    }

    /**
     * Detective name: Detective Robbie
     */
    public function getDetectiveNameAttribute(): string
    {
        return 'Detective ' . $this->getLobsterSourceName();
    }

    /**
     * Professor name: Professor Robbie
     */
    public function getProfessorNameAttribute(): string
    {
        return 'Professor ' . $this->getLobsterSourceName();
    }

    /**
     * President name: President Robbie
     */
    public function getPresidentNameAttribute(): string
    {
        return 'President ' . $this->getLobsterSourceName();
    }

    /**
     * Robot name: R-0881-E
     */
    public function getRobotNameAttribute(): string
    {
        $name = mb_strtoupper($this->getLobsterSourceName());
        $digits = '';

        foreach (str_split($name) as $char) {
            $digits .= str_pad((string) ord($char), 2, '0', STR_PAD_LEFT);
        }

        $code = mb_substr($digits, 0, 4);

        return mb_substr($name, 0, 1) . '-' . $code . '-' . mb_substr($name, -1, 1);
    }

    /**
     * Medieval name: Sir Robbie of the Realm
     */
    public function getMedievalNameAttribute(): string
    {
        $realms = ['the Realm', 'Westmarch', 'Ironhold', 'Dragonmere', 'Thornwall', 'Ashenvale', 'Stormhaven', 'the North'];

        return 'Sir ' . $this->getLobsterSourceName() . ' of ' . $this->pickFromName($realms);
    }

    /**
     * Alien name: Zor-Robbie of Nebula X
     */
    public function getAlienNameAttribute(): string
    {
        $prefixes = ['Zor', 'Xel', 'Kra', 'Vex', 'Nyx', 'Zyx', 'Quo', 'Zel'];
        $nebulas = ['Nebula X', 'Andromeda', 'the Void', 'Sector 7', 'the Outer Rim', 'Kepler-442', 'the Dark Zone', 'Centauri'];

        return $this->pickFromName($prefixes) . '-' . $this->getLobsterSourceName() . ' of ' . $this->pickFromName($nebulas);
    }

    /**
     * Elf name: Robbiel Starwhisper
     */
    public function getElfNameAttribute(): string
    {
        $suffixes = ['Starwhisper', 'Moonweaver', 'Leafsong', 'Dawnstrider', 'Nightbloom', 'Silverwind', 'Sunshadow', 'Mistwalker'];

        return $this->getLobsterSourceName() . 'iel ' . $this->pickFromName($suffixes);
    }

    /**
     * Dwarf name: Robbin Stonebeard
     */
    public function getDwarfNameAttribute(): string
    {
        $suffixes = ['Stonebeard', 'Ironfoot', 'Goldvein', 'Forgehammer', 'Deepdelve', 'Granitfist', 'Coalblack', 'Rumblerock'];

        return mb_substr($this->getLobsterSourceName(), 0, -1) . 'in ' . $this->pickFromName($suffixes);
    }

    /**
     * Cat name: Robbie Whiskers
     */
    public function getCatNameAttribute(): string
    {
        $suffixes = ['Whiskers', 'Purrington', 'McFluffins', 'von Meow', 'Pawsworth', 'Snugglebottom', 'Fluffernutter', 'Biscuits'];

        return $this->getLobsterSourceName() . ' ' . $this->pickFromName($suffixes);
    }

    /**
     * Formal name: The Right Honourable Robbie
     */
    public function getFormalNameAttribute(): string
    {
        return 'The Right Honourable ' . $this->getLobsterSourceName();
    }

    /**
     * Stage name: R.Love
     */
    public function getStageNameAttribute(): string
    {
        $initial = mb_strtoupper(mb_substr($this->getLobsterSourceName(), 0, 1));
        $suffixes = ['Love', 'Star', 'Blaze', 'Storm', 'Nova', 'Vega', 'Cruz', 'Phoenix'];

        return $initial . '.' . $this->pickFromName($suffixes);
    }

    /**
     * Baby name: Widdle Wobbie
     */
    public function getBabyNameAttribute(): string
    {
        $name = $this->getLobsterSourceName();
        $baby = str_ireplace(['r', 'l'], 'w', $name);

        return 'Widdle ' . ucfirst($baby);
    }

    /**
     * Shouting name: ROBBIE!!!
     */
    public function getShoutingNameAttribute(): string
    {
        return mb_strtoupper($this->getLobsterSourceName()) . '!!!';
    }

    /**
     * Whisper name: ...robbie...
     */
    public function getWhisperNameAttribute(): string
    {
        return '...' . mb_strtolower($this->getLobsterSourceName()) . '...';
    }

    /**
     * Acronym name: R.O.B.B.I.E.
     */
    public function getAcronymNameAttribute(): string
    {
        $letters = str_split(mb_strtoupper($this->getLobsterSourceName()));

        return implode('.', $letters) . '.';
    }

    // ─── Meta Methods ────────────────────────────────────────

    /**
     * Get a random fun name.
     */
    public function getRandomNameAttribute(): string
    {
        $types = $this->getLobsterNameTypes();

        return $this->getAttribute($types[array_rand($types)]);
    }

    /**
     * Get ALL the names as an associative array.
     */
    public function getAllNamesAttribute(): array
    {
        $names = [];

        foreach ($this->getLobsterNameTypes() as $type) {
            $names[$type] = $this->getAttribute($type);
        }

        return $names;
    }

    /**
     * Get a name card - a formatted string of all names.
     */
    public function getNameCardAttribute(): string
    {
        $lines = [];

        foreach ($this->all_names as $type => $name) {
            $label = ucwords(str_replace('_', ' ', $type));
            $lines[] = "{$label}: {$name}";
        }

        return implode("\n", $lines);
    }

    /**
     * List of all available name attribute keys.
     */
    public function getLobsterNameTypes(): array
    {
        return [
            'lobster_name',
            'dog_name',
            'doctor_name',
            'judge_name',
            'king_name',
            'queen_name',
            'initial_name',
            'backwards_name',
            'pirate_name',
            'ninja_name',
            'wizard_name',
            'rapper_name',
            'spy_name',
            'chef_name',
            'wrestler_name',
            'viking_name',
            'superhero_name',
            'villain_name',
            'cowboy_name',
            'rockstar_name',
            'mafia_name',
            'detective_name',
            'professor_name',
            'president_name',
            'robot_name',
            'medieval_name',
            'alien_name',
            'elf_name',
            'dwarf_name',
            'cat_name',
            'formal_name',
            'stage_name',
            'baby_name',
            'shouting_name',
            'whisper_name',
            'acronym_name',
        ];
    }

    /**
     * Deterministically pick an item from an array based on the name.
     * Same name always produces the same result - no randomness.
     */
    protected function pickFromName(array $options): string
    {
        $hash = crc32($this->getLobsterSourceName());

        return $options[abs($hash) % count($options)];
    }
}
