<?php namespace Daria\Learning;

use Backend;
use Daria\Learning\Components\Example;
use System\Classes\PluginBase;

/**
 * Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'learning',
            'description' => 'No description provided yet...',
            'author'      => 'daria',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            Example::class => 'example',
        ];
    }

    /**
     * Registers any backend permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'daria.learning.some_permission' => [
                'tab' => 'learning',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers backend navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'learning' => [
                'label'       => 'learning',
                'url'         => Backend::url('daria/learning/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['daria.learning.*'],
                'order'       => 500,
            ],
        ];
    }
}
