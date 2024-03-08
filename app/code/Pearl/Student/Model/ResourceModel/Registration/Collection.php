<?php
namespace Pearl\Student\Model\ResourceModel\Registration;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Pearl\Student\Model\Registration', 'Pearl\Student\Model\ResourceModel\Registration');
    }
}
