<?php
namespace Pearl\Student\Model\Student;

use Magento\Framework\Data\OptionSourceInterface;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{

    protected $collection;


    protected $loadedData;


    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \Pearl\Student\Model\ResourceModel\Registration\CollectionFactory $blogCollectionFactory,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $blogCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * Get Data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $blog) {
            $this->loadedData[$blog->getId()] = $blog->getData();
            $stringToConvert = $this->loadedData[$blog->getId()]['area_of_interest'];
            $arrayValue = explode(',', $stringToConvert);
            $this->loadedData[$blog->getId()]['area_of_interest'] = $arrayValue;
        }

        return $this->loadedData;
    }
}
