# Digital Prophecy Studios Starter Theme

Starter WordPress theme. Features [UIKit](https://getuikit.com/docs/introduction), SCSS compiler, TS/JS linting and minifying and class based functions.php

Requires a minimum of WordPress 5.3, PHP 7.4, and Composer 2

DPS Starter Theme is built with **Composer** and **Vite** usage in mind and is the recommended way to use this theme.

## Instructions

1. `$ nvm i` : Installs and switches to necessary node defined in `.nvmrc`
2. `$ yarn install` : Install yarn packages _(postinstall will run composer install and vite build)_

## Vite Commands

All minified assets are created to the `/build/` directory of the theme.

`$ yarn run build` : Builds assets folder, then compiles minified assets

`$ yarn run watch` : Watches assets folder for changes, then compiles minified assets

## Composer notes

If you decide to update the `psr-4` namespace prefix, you can use dump-autoload to do that without having to go through an install or update.

```
composer dump-autoload
```

## Resources

1. [PSR-4 Autoloader](http://www.php-fig.org/psr/psr-4/)
2. [PSR-2 PHP Coding Style Guide](http://www.php-fig.org/psr/psr-2/)
3. [Wordplate Extended ACF](https://github.com/wordplate/extended-acf)
4. [Vite](https://vitejs.dev/)
5. [Prettier](https://prettier.io/)
6. [UIkit](https://getuikit.com/)
7. [BEM Introduction](http://getbem.com/introduction/)
8. [Sass 7-1 Pattern](https://sass-guidelin.es/#the-7-1-pattern)
9. [Sass Lint](https://github.com/sasstools/sass-lint)
10. [TypeScript](https://www.typescriptlang.org/)

## Copyright and License

The following resources are included or used in part within the theme package.

- [Underscores](http://underscores.me/) by Automattic, Inc. - Licensed under the [GPL, version 2 or later](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html).

All other resources and theme elements are licensed under the [GNU GPL](http://www.gnu.org/licenses/old-licenses/gpl-2.0.html), version 2 or later.
