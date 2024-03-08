<?php

namespace Pearl\Student\Api;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Pearl\Student\Api\Data\DataInterface;

interface DataRepositoryInterface
{
    public function save(DataInterface $data);

    public function getById($id);

    public function getList();
    public function deleteById($id);

}
