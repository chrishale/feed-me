<?php

namespace craft\feedme\fields;

use Cake\Utility\Hash;
use craft\feedme\base\Field;
use craft\feedme\base\FieldInterface;

class Dropdown extends Field implements FieldInterface
{
    // Properties
    // =========================================================================

    public static $name = 'Dropdown';
    public static $class = 'craft\fields\Dropdown';


    // Templates
    // =========================================================================

    public function getMappingTemplate()
    {
        return 'feed-me/_includes/fields/option-select';
    }


    // Public Methods
    // =========================================================================

    public function parseField()
    {
        $value = $this->fetchValue();

        $options = Hash::get($this->field, 'settings.options');
        $match = Hash::get($this->fieldInfo, 'options.match', 'value');

        foreach ($options as $option) {
            if ($value === $option[$match]) {
                return $option['value'];
            }
        }

        return null;
    }

}
