<?php namespace Zombiecorp\SupportJS;

use Backend;
use App;
use Event;
use System\Classes\PluginBase;

/**
 * SupportJS Plugin Information File
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
            'name'        => 'SupportJs',
            'description' => 'Adds generic suporting JS files',
            'author'      => 'Zombiecorp',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    // public function register()
    // {

    // }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        Event::listen('backend.page.beforeDisplay', function($controller, $action, $params){
            $controller->addJs('/plugins/zombiecorp/supportjs/assets/js/support-bundle.js', 'Zombiecorp.SupportBundle');
        });
        Event::listen('cms.page.beforeDisplay', function($controller, $action, $params){
            $controller->addJs('/plugins/zombiecorp/supportjs/assets/js/support-bundle.js', 'Zombiecorp.SupportBundle');
        });
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        // $this->addJs('js/support-bundle.js', 'Zombiecorp.SupportBundle');
        return []; // Remove this line to activate

        return [
            'Zombiecorp\SupportJS\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'zombiecorp.supportjs.some_permission' => [
                'tab' => 'SupportJS',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'supportjs' => [
                'label'       => 'SupportJS',
                'url'         => Backend::url('zombiecorp/supportjs/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['zombiecorp.supportjs.*'],
                'order'       => 500,
            ],
        ];
    }
}
