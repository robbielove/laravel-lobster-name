<?php

namespace Robbielove\LobsterName\Tests;

use PHPUnit\Framework\TestCase;
use Robbielove\LobsterName\LobsterName;

class HasLobsterNameTest extends TestCase
{
    protected LobsterName $robbie;
    protected LobsterName $sammy;

    protected function setUp(): void
    {
        parent::setUp();
        $this->robbie = new LobsterName('Robbie');
        $this->sammy = new LobsterName('Sammy');
    }

    // ─── OG Names ────────────────────────────────────────────

    public function test_lobster_name(): void
    {
        $this->assertSame('Robbie Robster', $this->robbie->lobster_name);
        $this->assertSame('Sammy Sobster', $this->sammy->lobster_name);
    }

    public function test_dog_name(): void
    {
        $this->assertSame('Rob Dog', $this->robbie->dog_name);
        $this->assertSame('Sam Dog', $this->sammy->dog_name);
    }

    public function test_doctor_name(): void
    {
        $this->assertSame('Dr. Robbie', $this->robbie->doctor_name);
    }

    public function test_judge_name(): void
    {
        $this->assertSame('The Honourable Judge Robbie', $this->robbie->judge_name);
    }

    public function test_king_name(): void
    {
        $this->assertSame('Your Highness, Robbie', $this->robbie->king_name);
    }

    public function test_queen_name(): void
    {
        $this->assertSame('Your Majesty, Robbie', $this->robbie->queen_name);
    }

    public function test_initial_name(): void
    {
        $this->assertSame('R', $this->robbie->initial_name);
        $this->assertSame('S', $this->sammy->initial_name);
    }

    public function test_backwards_name(): void
    {
        $this->assertSame('eibboR', $this->robbie->backwards_name);
    }

    // ─── New Crew ────────────────────────────────────────────

    public function test_pirate_name_starts_with_captain(): void
    {
        $this->assertStringStartsWith('Captain Robbie', $this->robbie->pirate_name);
    }

    public function test_ninja_name_ends_with_source_name(): void
    {
        $this->assertStringEndsWith('Robbie', $this->robbie->ninja_name);
    }

    public function test_wizard_name_starts_with_source_name(): void
    {
        $this->assertStringStartsWith('Robbie', $this->robbie->wizard_name);
    }

    public function test_rapper_name_ends_with_source_name(): void
    {
        $this->assertStringEndsWith('Robbie', $this->robbie->rapper_name);
    }

    public function test_spy_name(): void
    {
        $this->assertSame('Agent R', $this->robbie->spy_name);
        $this->assertSame('Agent S', $this->sammy->spy_name);
    }

    public function test_chef_name(): void
    {
        $this->assertSame('Chef Robbie', $this->robbie->chef_name);
    }

    public function test_wrestler_name(): void
    {
        $this->assertSame('The Robster', $this->robbie->wrestler_name);
        $this->assertSame('The Samster', $this->sammy->wrestler_name);
    }

    public function test_superhero_name_contains_source_name(): void
    {
        $this->assertStringStartsWith('The ', $this->robbie->superhero_name);
        $this->assertStringEndsWith('Robbie', $this->robbie->superhero_name);
    }

    public function test_detective_name(): void
    {
        $this->assertSame('Detective Robbie', $this->robbie->detective_name);
    }

    public function test_professor_name(): void
    {
        $this->assertSame('Professor Robbie', $this->robbie->professor_name);
    }

    public function test_president_name(): void
    {
        $this->assertSame('President Robbie', $this->robbie->president_name);
    }

    public function test_robot_name_format(): void
    {
        $robot = $this->robbie->robot_name;
        $this->assertStringStartsWith('R-', $robot);
        $this->assertMatchesRegularExpression('/^R-\d{4}-E$/', $robot);
    }

    public function test_formal_name(): void
    {
        $this->assertSame('The Right Honourable Robbie', $this->robbie->formal_name);
    }

    public function test_baby_name_replaces_r_and_l(): void
    {
        $this->assertSame('Widdle Wobbie', $this->robbie->baby_name);
    }

    public function test_shouting_name(): void
    {
        $this->assertSame('ROBBIE!!!', $this->robbie->shouting_name);
    }

    public function test_whisper_name(): void
    {
        $this->assertSame('...robbie...', $this->robbie->whisper_name);
    }

    public function test_acronym_name(): void
    {
        $this->assertSame('R.O.B.B.I.E.', $this->robbie->acronym_name);
    }

    // ─── Determinism ─────────────────────────────────────────

    public function test_same_name_always_produces_same_results(): void
    {
        $a = new LobsterName('Robbie');
        $b = new LobsterName('Robbie');

        $this->assertSame($a->pirate_name, $b->pirate_name);
        $this->assertSame($a->ninja_name, $b->ninja_name);
        $this->assertSame($a->wizard_name, $b->wizard_name);
        $this->assertSame($a->cowboy_name, $b->cowboy_name);
        $this->assertSame($a->alien_name, $b->alien_name);
    }

    public function test_different_names_produce_different_results(): void
    {
        // They should pick different suffixes for most types
        $allSameCount = 0;

        foreach (['pirate_name', 'ninja_name', 'wizard_name', 'viking_name'] as $type) {
            if ($this->robbie->$type === $this->sammy->$type) {
                $allSameCount++;
            }
        }

        // It's astronomically unlikely all 4 would match
        $this->assertLessThan(4, $allSameCount);
    }

    // ─── Meta Methods ────────────────────────────────────────

    public function test_all_names_returns_complete_array(): void
    {
        $all = $this->robbie->all_names;

        $this->assertIsArray($all);
        $this->assertCount(count($this->robbie->getLobsterNameTypes()), $all);
        $this->assertArrayHasKey('lobster_name', $all);
        $this->assertArrayHasKey('pirate_name', $all);
        $this->assertArrayHasKey('alien_name', $all);
    }

    public function test_random_name_returns_a_string(): void
    {
        $name = $this->robbie->random_name;

        $this->assertIsString($name);
        $this->assertNotEmpty($name);
    }

    public function test_name_card_contains_all_types(): void
    {
        $card = $this->robbie->name_card;

        $this->assertStringContainsString('Lobster Name:', $card);
        $this->assertStringContainsString('Pirate Name:', $card);
        $this->assertStringContainsString('Robot Name:', $card);
    }

    public function test_lobster_name_types_count(): void
    {
        $types = $this->robbie->getLobsterNameTypes();

        $this->assertGreaterThanOrEqual(30, count($types), 'Should have at least 30 name types');
    }

    // ─── Static Factory ──────────────────────────────────────

    public function test_static_for_factory(): void
    {
        $name = LobsterName::for('Alice')->lobster_name;

        $this->assertSame('Alice Aobster', $name);
    }

    public function test_to_string_returns_name_card(): void
    {
        $lobster = new LobsterName('Robbie');

        $this->assertStringContainsString('Lobster Name: Robbie Robster', (string) $lobster);
    }

    // ─── Edge Cases ──────────────────────────────────────────

    public function test_single_character_name(): void
    {
        $x = new LobsterName('X');

        $this->assertSame('X Xobster', $x->lobster_name);
        $this->assertSame('X', $x->initial_name);
        $this->assertSame('X', $x->backwards_name);
        $this->assertSame('Agent X', $x->spy_name);
        $this->assertSame('X.', $x->acronym_name);
    }

    public function test_empty_name_does_not_crash(): void
    {
        $empty = new LobsterName('');

        // Should not throw exceptions
        $this->assertIsString($empty->lobster_name);
        $this->assertIsString($empty->pirate_name);
        $this->assertIsArray($empty->all_names);
    }
}
