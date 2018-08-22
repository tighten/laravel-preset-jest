# Front-End Presets
This package is a drop-in replacement for the Laravel `php artisan preset` command. 

*IMPORTANT: THIS REPO IS UNDER ACTIVE DEVELOPMENT! USE AT YOUR OWN RISK!*

## Installation
This package is not currently on Packagist--we'll put it up once it's production ready--so you will have to link to this repo instead.

To do so, add the following in your `composer.json` file:

```
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/tightenco/laravel-preset-jest"
    }
],
"require": {
    "tightenco/laravel-preset-jest": "@dev"
},
```

And run:

`$ composer update` to install the package.

## Usage

This package gives you access to the same 4 Artisan preset commands available with a regular Laravel install. However, the command needs to instead be run as `php artisan fe-preset` (although this is likely to change in the future):

`$ php artisan fe-preset none`

`$ php artisan fe-preset bootstrap`

`$ php artisan fe-preset react`

`$ php artisan fe-preset vue`

While the functionality of `none` and `bootstrap` have remained more or less unchanged, both `react` and `vue` now install [Jest](https://jestjs.io/) as well as various utility libraries and dependencies (more specifically, [Vue-Test-Utils](https://vue-test-utils.vuejs.org/) for Vue and [Enzyme](http://airbnb.io/enzyme/) for React). This command also updates the project's `package.json` file with some configuration as well as two new commands to run your JS test suite:

`$ yarn test`

`$ yarn test-watch`

Example test files have been added in `resources/assets/js/components` for both the React and Vue presets. They should run out of the box with no further configuration needed.

To add new tests, add a file with either a `.spec.js` or `.test.js` extension, or add a `__tests__` directory with a `.js` file; Jest will be able to run all three.

For more advanced configuration, check out the [Jest docs](https://jestjs.io/docs/en/configuration).

---

Want to learn more about how to write front-end tests? Check out [this post](https://tighten.co/blog/its-time-to-start-testing-your-vue-components-getting-started-with-jest) by [@CalebPorzio](https://twitter.com/calebporzio) on our blog!
