<?php
namespace Form\Admin\Block\Adminhtml\Blog;

class Edit extends \Magento\Backend\Block\Widget\Form\Container
{

    protected $_objectId;


    protected $_blockGroup;

    protected $_controller;


    protected $buttonList;


    protected function _construct()
    {
        $this->_objectId = 'id';
        $this->_blockGroup = 'Form_Admin';
        $this->_controller = 'adminhtml_blog';
        $this->buttonList->remove('delete');
        parent::_construct();
    }
}
