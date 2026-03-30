<?php

namespace Robbielove\LobsterName\Commands;

use Illuminate\Console\Command;
use Robbielove\LobsterName\LobsterName;

class LobsterNameCommand extends Command
{
    protected $signature = 'lobster:name {name : The name to lobsterify} {--type= : A specific name type (e.g. pirate, ninja, wizard)} {--all : Show all name types}';

    protected $description = 'Generate fun alter-ego names for any name';

    public function handle(): int
    {
        $lobster = new LobsterName($this->argument('name'));

        $this->newLine();

        if ($this->option('all')) {
            $this->showAllNames($lobster);

            return self::SUCCESS;
        }

        if ($type = $this->option('type')) {
            $attribute = $type . '_name';

            if (! in_array($attribute, $lobster->getLobsterNameTypes())) {
                $this->error("Unknown name type: {$type}");
                $this->line('Available types: ' . implode(', ', array_map(
                    fn ($t) => str_replace('_name', '', $t),
                    $lobster->getLobsterNameTypes()
                )));

                return self::FAILURE;
            }

            $this->line('  ' . $lobster->getAttribute($attribute));
            $this->newLine();

            return self::SUCCESS;
        }

        // Default: show a curated selection
        $highlights = [
            'lobster_name',
            'pirate_name',
            'ninja_name',
            'wizard_name',
            'rapper_name',
            'superhero_name',
            'villain_name',
            'cowboy_name',
            'spy_name',
            'mafia_name',
            'robot_name',
            'alien_name',
            'baby_name',
        ];

        $this->components->twoColumnDetail('<fg=yellow>Type</>', '<fg=yellow>Name</>');

        foreach ($highlights as $type) {
            $label = ucwords(str_replace('_', ' ', str_replace('_name', '', $type)));
            $this->components->twoColumnDetail($label, $lobster->getAttribute($type));
        }

        $this->newLine();
        $this->line('  <fg=gray>Use --all for all ' . count($lobster->getLobsterNameTypes()) . ' name types, or --type=pirate for a specific one.</>');
        $this->newLine();

        return self::SUCCESS;
    }

    protected function showAllNames(LobsterName $lobster): void
    {
        $this->components->twoColumnDetail('<fg=yellow>Type</>', '<fg=yellow>Name</>');

        foreach ($lobster->all_names as $type => $name) {
            $label = ucwords(str_replace('_', ' ', str_replace('_name', '', $type)));
            $this->components->twoColumnDetail($label, $name);
        }

        $this->newLine();
    }
}
