<?php

namespace Robbielove\LobsterName;

use Robbielove\LobsterName\Traits\HasLobsterName;

/**
 * Standalone helper - use without a model.
 *
 * $lobster = new LobsterName('Robbie');
 * echo $lobster->pirate_name;   // Captain Robbie Blacktide
 * echo $lobster->random_name;   // (surprise!)
 * echo LobsterName::for('Robbie')->lobster_name; // Robbie Robster
 */
class LobsterName
{
    use HasLobsterName;

    protected string $sourceName;
    protected array $attributes = [];

    public function __construct(string $name)
    {
        $this->sourceName = $name;
    }

    /**
     * Static factory.
     */
    public static function for(string $name): self
    {
        return new self($name);
    }

    /**
     * Override the trait's source method to use our stored name.
     */
    public function getLobsterSourceName(): string
    {
        return $this->sourceName;
    }

    /**
     * Make attribute access work without Eloquent.
     */
    public function getAttribute(string $key): mixed
    {
        $method = 'get' . str_replace(' ', '', ucwords(str_replace('_', ' ', $key))) . 'Attribute';

        if (method_exists($this, $method)) {
            return $this->{$method}();
        }

        return $this->attributes[$key] ?? null;
    }

    /**
     * Magic getter for attribute-style access.
     */
    public function __get(string $key): mixed
    {
        return $this->getAttribute($key);
    }

    /**
     * Return the name card when cast to string.
     */
    public function __toString(): string
    {
        return $this->getNameCardAttribute();
    }
}
