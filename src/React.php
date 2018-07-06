<?php

namespace Tightenco\Presets;

use Illuminate\Support\Arr;
use Illuminate\Filesystem\Filesystem;

class React extends Preset
{
    /**
     * Install the preset.
     *
     * @return void
     */
    public static function install()
    {
        static::ensureComponentDirectoryExists();
        static::updatePackages();
        static::updateWebpackConfiguration();
        static::updateBootstrapping();
        static::updateComponent();
        static::removeNodeModules();
    }

    /**
     * Update the given package array.
     *
     * @param  array  $packages
     * @return array
     */
    protected static function updatePackageArray(array $packages)
    {
        return Preset::REACT_PACKAGES + Arr::except($packages, array_keys(Preset::VUE_PACKAGES));
    }

    /**
     * Add Jest configuration entries to the given package array.
     *
     * @param  array $packages
     * @return array
     */
    protected static function updateTestConfigArray(array $packages)
    {
        $config = json_decode(file_get_contents(__DIR__.'/react-stubs/jest.config.json'), true);

        $packages['scripts'] = array_merge($packages['scripts'] + $config['scripts']);

        unset($packages['jest'], $packages['babel']);
        unset($config['scripts']);

        return array_merge($packages, $config);
    }

    /**
     * Update the Webpack configuration.
     *
     * @return void
     */
    protected static function updateWebpackConfiguration()
    {
        copy(__DIR__.'/react-stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    /**
     * Update the example component.
     *
     * @return void
     */
    protected static function updateComponent()
    {
        (new Filesystem)->delete([
            resource_path('assets/js/components/ExampleComponent.vue'),
            resource_path('assets/js/components/ExampleComponent.spec.js')
        ]);

        copy(
            __DIR__.'/react-stubs/Example.js',
            resource_path('assets/js/components/Example.js')
        );

        copy(
            __DIR__.'/react-stubs/Example.spec.js',
            resource_path('assets/js/components/Example.spec.js')
        );

        copy(
            __DIR__.'/react-stubs/setupTests.js',
            resource_path('assets/js/setupTests.js')
        );
    }

    /**
     * Update the bootstrapping files.
     *
     * @return void
     */
    protected static function updateBootstrapping()
    {
        copy(__DIR__.'/react-stubs/app.js', resource_path('assets/js/app.js'));
    }
}
