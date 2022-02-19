# lobster-name

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

## Install
`composer require robbielove/lobster-name`

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
$user->lobster_name;
$user->dog_name;
$user->doctor_name;
$user->judge_name;
$user->king_name;
$user->queen_name;
$user->initial_name;
$user->backwards_name;
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