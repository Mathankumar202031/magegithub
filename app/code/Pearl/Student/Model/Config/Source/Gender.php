<?php

namespace Pearl\Student\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;
class Gender implements OptionSourceInterface
{

    public function toOptionArray()
    {
        $options = [
            0 => [
                'label' => 'Male',
                'value' => 'Male'
            ],
            1 => [
                'label' => 'Female',
                'value' => 'Female'
            ],
        ];
        return $options;
    }
}
