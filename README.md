![Screenshot](https://github.com/tomatophp/tomato-themes/blob/master/art/screenshot.png)

# Tomato themes

A Theme System Like Wordpress on your Tomato Admin

## Installation

```bash
composer require tomatophp/tomato-themes
```
after install your package please run this command

```bash
php artisan tomato-themes:install
```

## Publish Assets

you can publish config file by use this command

```bash
php artisan vendor:publish --tag="tomato-themes-config"
```

you can publish views file by use this command

```bash
php artisan vendor:publish --tag="tomato-themes-views"
```

you can publish languages file by use this command

```bash
php artisan vendor:publish --tag="tomato-themes-lang"
```

you can publish migrations file by use this command

```bash
php artisan vendor:publish --tag="tomato-themes-migrations"
```

## Support

you can join our discord server to get support [TomatoPHP](https://discord.gg/Xqmt35Uh)

## Docs

you can check docs of this package on [Docs](https://docs.tomatophp.com/plugins/tomato-themes)

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security

Please see [SECURITY](SECURITY.md) for more information about security.

## Credits

- [Tomatophp](mailto:info@3x1.io)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
