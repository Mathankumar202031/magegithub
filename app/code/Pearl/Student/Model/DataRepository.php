<?php

namespace Pearl\Student\Model;

use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Exception\CouldNotSaveException;

use Pearl\Student\Api\DataRepositoryInterface;
use Pearl\Student\Api\Data\DataInterface;
use Pearl\Student\Model\Registration;
use Pearl\Student\Model\ResourceModel\Registration as ResourceModel;
use Pearl\Student\Model\ResourceModel\Registration\Collection;

class DataRepository  implements DataRepositoryInterface
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
     * @var SearchResultsInterface
     */
    protected $searchResult;

    /**
     * @var Registration
     */
    protected $model;

    public function __construct(Collection $collection,
                                ResourceModel $resourceModel,
                                SearchResultsInterface $searchResult,
                                Registration $model
    ) {
        $this->collection = $collection;
        $this->resourceModel = $resourceModel;
        $this->searchResult = $searchResult;
        $this->model = $model;
    }

    public function save(DataInterface $data)
    {
        try {
            $this->resourceModel->save($data);
        }catch (\Exception $e) {
            throw new CouldNotSaveException(_($e->getMessage()));
        }
        return $data;
    }

    public function getById($id)
    {
        $data = $this->model;
        $this->resourceModel->load($data, $id);
        return $data;
    }

    public function deleteById($id)
    {
        $data = $this->model;
        $this->getById($id);
        return $this->resourceModel->delete($data);
    }


    public function getList()
    {
        return $this->collection->getItems();
    }
}
