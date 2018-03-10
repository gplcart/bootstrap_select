<?php

/**
 * @package Bootstrap Select
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2017, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\bootstrap_select;

use gplcart\core\Module;

/**
 * Main class for Bootstrap Select module
 */
class Main
{

    /**
     * Module class instance
     * @var \gplcart\core\Module $module
     */
    protected $module;

    /**
     * @param Module $module
     */
    public function __construct(Module $module)
    {
        $this->module = $module;
    }

    /**
     * Implements hook "library.list"
     * @param array $libraries
     */
    public function hookLibraryList(array &$libraries)
    {
        $libraries['bootstrap_select'] = array(
            'name' => 'Bootstrap Select', // @text
            'description' => "A jQuery plugin that utilizes Bootstrap's dropdown.js to style and bring additional functionality to standard select elements", // @text
            'type' => 'asset',
            'module' => 'bootstrap_select',
            'url' => 'https://github.com/silviomoreto/bootstrap-select',
            'download' => 'https://github.com/silviomoreto/bootstrap-select/archive/v1.12.1.zip',
            'version' => '1.12.1',
            'files' => array(
                'dist/js/bootstrap-select.min.js',
                'dist/css/bootstrap-select.min.css',
            ),
            'dependencies' => array(
                'jquery' => '>= 1.8',
                'bootstrap' => '>= 3.0',
            ),
        );
    }

    /**
     * Implements hook "route.list"
     * @param array $routes
     */
    public function hookRouteList(array &$routes)
    {
        $routes['admin/module/settings/bootstrap_select'] = array(
            'access' => 'module_edit',
            'handlers' => array(
                'controller' => array('gplcart\\modules\\bootstrap_select\\controllers\\Settings', 'editSettings')
            )
        );
    }

    /**
     * Implements hook "construct.controller.backend"
     * @param \gplcart\core\controllers\backend\Controller $controller
     */
    public function hookConstructControllerBackend($controller)
    {
        $this->addLibrary($controller);
    }

    /**
     * Add Bootstrap Select library and additional assets
     * @param \gplcart\core\Controller $controller
     */
    public function addLibrary($controller)
    {
        $settings = $this->module->getSettings('bootstrap_select');

        $controller->setJsSettings('bootstrap_select', $settings);
        $controller->addAssetLibrary('bootstrap_select');
        $controller->setJs('system/modules/bootstrap_select/js/common.js');
    }

}
