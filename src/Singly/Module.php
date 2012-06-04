<?php
/**
 * Singly Authentication
 *
 * @author Tom Anderson <tom.h.anderson@gmail.com
 * @license MIT
 */

namespace Singly;

use Zend\ModuleManager\ModuleManager;

class Module {
    protected static $options;

    public function init(ModuleManager $moduleManager)
    {
        $moduleManager->events()->attach('loadModules.post', array($this, 'modulesLoaded'));
    }

    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    public function modulesLoaded($e)
    {
        $config = $e->getConfigListener()->getMergedConfig();
        static::$options = $config['singly'];
    }

    public static function getOption($option)
    {
        if (!isset(static::$options[$option])) {
            return null;
        }
        return static::$options[$option];
    }

}