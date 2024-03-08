<?php
namespace Pearl\Student\CustomerData;

use Magento\Customer\CustomerData\SectionSourceInterface;
use Pearl\Student\Model\DataRepository;

class CustomSection implements SectionSourceInterface
{
    protected $dataRepository;
    public function __construct(DataRepository $dataRepository)
    {
        $this->dataRepository = $dataRepository;
    }

    public function getSectionData()
    {
        $data = array();
        $values = $this->dataRepository->getList();

        foreach ($values as $value) {
            $key = array(
                'name' => $value['name'],
                'gender' => $value['gender'],
                'comment' => $value['comment']);
            $data[] = $key;
        }
        return $data;
    }
}
