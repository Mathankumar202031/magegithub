<?php
namespace Pearl\Student\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Registration extends AbstractModel
{
//    /**
//     * No route page id.
//     */
//    const NOROUTE_ENTITY_ID = 'no-route';
//
//    /**
//     * Entity Id
//     */
//    const ENTITY_ID = 'entity_id';
//
//    /**
//     * BlogManager Blog cache tag.
//     */
//    const CACHE_TAG = 'webkul_blogmanager_blog';
//
//    /**
//     * @var string
//     */
//    protected $_cacheTag = 'webkul_blogmanager_blog';
//
//    /**
//     * @var string
//     */
//    protected $_eventPrefix = 'webkul_blogmanager_blog';
//
//    /**
//     * Dependency Initilization
//     *
//     * @return void
//     */
//    public function _construct()
//    {
//        $this->_init(\Form\Admin\Model\ResourceModel\Blog::class);
//    }
//
//    /**
//     * Load object data.
//     *
//     * @param int $id
//     * @param string|null $field
//     * @return $this
//     */
//    public function load($id, $field = null)
//    {
//        if ($id === null) {
//            return $this->noRoute();
//        }
//        return parent::load($id, $field);
//    }
//
//    /**
//     * No Route
//     *
//     * @return $this
//     */
//    public function noRoute()
//    {
//        return $this->load(self::NOROUTE_ENTITY_ID, $this->getIdFieldName());
//    }
//
//    /**
//     * Get Identities
//     *
//     * @return array
//     */
//    public function getIdentities()
//    {
//        return [self::CACHE_TAG.'_'.$this->getId()];
//    }
//
//    /**
//     * Get Id
//     *
//     * @return int|null
//     */
//    public function getId()
//    {
//        return parent::getData(self::ENTITY_ID);
//    }
//
//    public function setId($id)
//    {
//        return $this->setData(self::ENTITY_ID, $id);
//    }
    protected function _construct()
    {
        $this->_init('Pearl\Student\Model\ResourceModel\Registration');
    }
}
