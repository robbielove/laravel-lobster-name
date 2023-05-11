# lobster-name

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

## Install
`composer require robbielove/laravel-lobster-name`

## Usage
Add the trait to your model:
```php
use RobbieLove\LobsterName\Traits\HasLobsterName;

class User extends Model
{
    use HasLobsterName;
}

// use as attribute:

$user = new User;
$user->lobster_name; // Robbie Robster
$user->dog_name; // Rob Dog
$user->doctor_name; // Dr, Robbie
$user->judge_name; // The Honorable Judge Robbie
$user->king_name; // Your Highness, Robbie
$user->queen_name; // Your Majesty, Robbie
$user->initial_name; // R
$user->backwards_name; // eibboR

// New methods
$user->pirate_name; // Captain Robbie
$user->superhero_name; // Super Robbie
$user->secret_agent_name; // Agent R
$user->rapper_name; // Lil' Robbie
$user->space_explorer_name; // Astro Robbie
$user->anagram_name; // e.g. eobbiR
$user->alternating_case_name; // RoBbIe
$user->excited_name; // Robbie!!!
$user->reversed_case_name; // rOBBIE
$user->random_vowel_replaced_name; // e.g. Rebbe
$user->random_pattern_name; // e.g. Rebco
$user->palindrome_name; // e.g. Robor
$user->caesar_cipher_name; // e.g. Tloiaa
$user->emoji_name; // e.g. R🦄o🌈b🍩b🍦i🍉e🌮
$user->underscore_name; // e.g. R_obb_ie
$user->alliterative_name; // Robbie the Rabbit
$user->rhyming_name; // e.g. Bobbie
$user->onomatopoeia_name; // Robbie the Rumble
$user->in_pig_latin_name; // Obbieray
$user->in_gibberish_name; // Robsobobbier
$user->double_letters_name; // RRoobbbbiiee
$user->blankspace_name; // "  R  o  b  b  i  e  "
```

## Testing
Run the tests with:

``` bash
vendor/bin/phpunit
```

## Changelog
Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing
Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Robbie Love](https://github.com/robbielove)
- [All Contributors](https://github.com/robbielove/lobster-name/contributors)

## Security
If you discover any security-related issues, please email 13571547+robbielove@users.noreply.github.com instead of using the issue tracker.

## License
The MIT License (MIT). Please see [License File](/LICENSE.md) for more information.