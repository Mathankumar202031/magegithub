<?php
namespace Pearl\Student\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Registration extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('student_registration', 'id');
    }
}
