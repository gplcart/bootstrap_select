<?php

/**
 * @package Bootstrap Select
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2017, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */

namespace gplcart\modules\bootstrap_select;

use gplcart\core\Module,
    gplcart\core\Config;

/**
 * Main class for Bootstrap Select module
 */
class BootstrapSelect extends Module
{

    /**
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        parent::__construct($config);
    }

    /**
     * Implements hook "library.list"
     * @param array $libraries
     */
    public function hookLibraryList(array &$libraries)
    {
        $libraries['bootstrap_select'] = array(
            'name' => /* @text */'Bootstrap Select',
            'description' => /* @text */"A jQuery plugin that utilizes Bootstrap's dropdown.js to style and bring additional functionality to standard select elements",
            'type' => 'asset',
            'module' => 'bootstrap_select',
            'url' => 'https://github.com/silviomoreto/bootstrap-select',
            'download' => 'https://github.com/silviomoreto/bootstrap-select/archive/v1.12.1.zip',
            'version_source' => array(
                'file' => 'vendor/bootstrap_select/dist/js/bootstrap-select.min.js',
                'pattern' => '/v(\\d+\\.+\\d+\\.+\\d+)/',
            ),
            'files' => array(
                'vendor/bootstrap_select/dist/js/bootstrap-select.min.js',
                'vendor/bootstrap_select/dist/css/bootstrap-select.min.css',
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
     * Implements hook "module.enable.after"
     */
    public function hookModuleEnableAfter()
    {
        $this->getLibrary()->clearCache();
    }

    /**
     * Implements hook "module.disable.after"
     */
    public function hookModuleDisableAfter()
    {
        $this->getLibrary()->clearCache();
    }

    /**
     * Implements hook "module.install.after"
     */
    public function hookModuleInstallAfter()
    {
        $this->getLibrary()->clearCache();
    }

    /**
     * Implements hook "module.uninstall.after"
     */
    public function hookModuleUninstallAfter()
    {
        $this->getLibrary()->clearCache();
    }

    /**
     * Add Bootstrap Select library and additional assets
     * @param \gplcart\core\Controller $controller
     */
    public function addLibrary($controller)
    {
        $settings = $this->config->getFromModule('bootstrap_select');
        $controller->setJsSettings('bootstrap_select', $settings);

        $options = array('aggregate' => false);
        $controller->addAssetLibrary('bootstrap_select', $options);
        $controller->setJs('system/modules/bootstrap_select/js/common.js', $options);
    }

}
