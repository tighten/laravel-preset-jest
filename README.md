# Front-End Presets
This package a drop-in replacement for the Laravel `php artisan preset` command that adds Jest testing for Vue and React.

**IMPORTANT: These presets will overwrite many of the files within the `resources` directory and your `package.json` file. It is currently only recommended to use this package with new Laravel projects!**

## Installation
To install, simply run `$ composer require tightenco\laravel-preset-jest`.

## Usage

This package gives you access to the same 4 Artisan preset commands available with a regular Laravel install. However, the command has needs to instead be run as `php artisan fe-preset`:

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
