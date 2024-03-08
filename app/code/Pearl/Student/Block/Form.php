<?php

namespace Pearl\Student\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Pearl\Student\Model\ResourceModel\Registration\Collection;
use Pearl\Student\Model\Registration;
use Pearl\Student\Model\ResourceModel\Registration as ResourceModel;
use Pearl\Student\Api\DataRepositoryInterface;

class Form extends Template
{
    /**
     * @var Collection
     */
    protected $collection;

    /**
     * @var ResourceModel
     */
    protected $resourceModel;

    /**
     * @var DataRepositoryInterface
     */
    protected  $dataRepository;

    /**
     * @param Context $context
     * @param Collection $collection
     * @param Registration $registration
     * @param ResourceModel $resourceModel
     * @param array $data
     */
    public function __construct(Context       $context,
                                Collection    $collection,
                                Registration  $registration,
                                DataRepositoryInterface $dataRepository,
                                ResourceModel $resourceModel,
                                array         $data = [])
    {
        parent::__construct($context, $data);
        $this->collection = $collection;
        $this->registration = $registration;
        $this->dataRepository = $dataRepository;
        $this->resourceModel = $resourceModel;
    }

    /**
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl('student/form/submit', ['_secure' => true]);
    }

    /**
     * @return Registration
     */
    public function getAllData()
    {
        $id = $this->getRequest()->getParam("id");
        $model = $this->dataRepository->getById($id);
        return $model;
    }
}
