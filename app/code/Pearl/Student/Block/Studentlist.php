<?php

namespace Pearl\Student\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Pearl\Student\Model\ResourceModel\Registration\Collection;
//use Pearl\Student\Api\Data\DataSearchResultInterface;
use Pearl\Student\Api\DataRepositoryInterface;

class Studentlist extends Template
{

    /**
     * @var Collection
     */
    public $collection;

    /**
     * @var
     */
    protected $searchResult;

    /**
     * @var DataRepositoryInterface
     */
    protected $repository;

    /**
     * @param Context $context
     * @param Collection $collectionFactory
     * @param array $data
     */
    public function __construct(Context    $context,
                                Collection $collectionFactory,
                                DataRepositoryInterface $repository,
                                array      $data = [])
    {
        $this->collection = $collectionFactory;
        $this->repository = $repository;
        parent::__construct($context, $data);
    }

    /**
     * @return Collection
     */
    public function getCollection()
    {

        $collection = $this->repository->getList();
        return $collection;
    }

    public function getDeleteAction()
    {
        return $this->getUrl('student/form/studentdelete', ['_secure' => true]);
    }

    public function getEditAction()
    {
        return $this->getUrl('student/form/studentupdate', ['_secure' => true]);
    }
}
