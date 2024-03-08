<?php
namespace Pearl\Student\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Registration extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Pearl\Student\Model\ResourceModel\Registration');
    }
}
