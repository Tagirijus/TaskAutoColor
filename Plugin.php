<?php

namespace Kanboard\Plugin\TagiKPTaskAutoColor;

use Kanboard\Core\Plugin\Base;


class Plugin extends Base
{
    public function initialize()
    {
        $this->hook->on('model:task:creation:prepare', function (&$values) {
            return $this->colorizeTaskByPriority(($values));
        });

        $this->hook->on('model:task:modification:prepare', function (&$values) {
            return $this->colorizeTaskByPriority(($values));
        });
    }

    public function colorizeTaskByPriority(&$values)
    {
        if (array_key_exists('priority', $values)) {

            if ($values['priority'] == 0) {
                $values['color_id'] = 'green';
            }

            elseif ($values['priority'] == 1) {
                $values['color_id'] = 'yellow';
            }

            elseif ($values['priority'] == 2) {
                $values['color_id'] = 'orange';
            }

            elseif ($values['priority'] == 3) {
                $values['color_id'] = 'pink';
            }
        }

        return $values;
    }

    public function getPluginName()
    {
        // Plugin Name MUST be identical to namespace for Plugin Directory to detect updated versions
        // Do not translate the plugin name here
        return 'TagiKPTaskAutoColor';
    }

    public function getPluginDescription()
    {
        return t('This plugin automatic colorizes the task according to its priority.');
    }

    public function getPluginAuthor()
    {
        return 'Tagirijus';
    }

    public function getPluginVersion()
    {
        return '1.1.0';
    }

    public function getCompatibleVersion()
    {
        // Examples:
        // >=1.0.37
        // <1.0.37
        // <=1.0.37
        return '>=1.2.26';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/Tagirijus/TagiKPTaskAutoColor';
    }
}
