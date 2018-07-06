<?php

namespace Tightenco\Presets;

use Illuminate\Filesystem\Filesystem;

class Preset
{
    /**
     * The list of Bootstrap packages to add to the "package.json" file
     *
     * @var array
     */
    const BOOTSTRAP_PACKAGES = [
        'bootstrap' => '^4.0.0',
        'jquery' => '^3.2',
        'popper.js' => '^1.12',
    ];

    /**
     * The list of React packages to add to the "package.json" file
     *
     * @var array
     */
    const REACT_PACKAGES = [
        'babel-jest' => '^23.2.0',
        'babel-preset-env' => '^1.7.0',
        'babel-preset-react' => '^6.23.0',
        'enzyme' => '^3.3.0',
        'enzyme-adapter-react-16' => '^1.1.1',
        'enzyme-to-json' => '^3.3.4',
        'jest' => '^23.3.0',
        'react' => '^16.2.0',
        'react-dom' => '^16.2.0',
        'react-test-renderer' => '^16.4.1',
    ];

    /**
     * The list of Vue packages to add to the "package.json" file
     *
     * @var array
     */
    const VUE_PACKAGES = [
        'jest' => '^23.3.0',
        'jest-serializer-vue' => '^2.0.2',
        'vue' => '^2.5.7',
        'vue-jest' => '^2.6.0',
        '@vue/test-utils' => '^1.0.0-beta.20',
    ];

    /**
     * Ensure the component directories we need exist.
     *
     * @return void
     */
    protected static function ensureComponentDirectoryExists()
    {
        $filesystem = new Filesystem;

        if (! $filesystem->isDirectory($directory = resource_path('assets/js/components'))) {
            $filesystem->makeDirectory($directory, 0755, true);
        }
    }

    /**
     * Update the "package.json" file.
     *
     * @param  bool  $dev
     * @return void
     */
    protected static function updatePackages($dev = true)
    {
        if (! file_exists(base_path('package.json'))) {
            return;
        }

        $configurationKey = $dev ? 'devDependencies' : 'dependencies';

        $packages = json_decode(file_get_contents(base_path('package.json')), true);

        $packages[$configurationKey] = static::updatePackageArray(
            array_key_exists($configurationKey, $packages) ? $packages[$configurationKey] : []
        );

        ksort($packages[$configurationKey]);

        $packages = static::updateTestConfigArray($packages);

        file_put_contents(
            base_path('package.json'),
            json_encode($packages, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT).PHP_EOL
        );
    }

    /**
     * Remove the installed Node modules.
     *
     * @return void
     */
    protected static function removeNodeModules()
    {
        tap(new Filesystem, function ($files) {
            $files->deleteDirectory(base_path('node_modules'));

            $files->delete(base_path('yarn.lock'));
        });
    }
}
