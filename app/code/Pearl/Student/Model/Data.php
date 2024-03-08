<?php
namespace Pearl\Student\Model;
use Magento\Framework\Model\AbstractModel;
use Pearl\Student\Api\Data\DataInterface;
use Pearl\Student\Model\ResourceModel\Registration as ResourceModel;

class Data extends AbstractModel implements DataInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
    public function getId()
    {
        return $this->getData('id');
    }
    public function setId($id)
    {
        return $this->setData('id', $id);
    }
    public function getName()
    {
        return $this->getData('name');
    }
    public function setName($name)
    {
        return $this->setData('name', $name);
    }
    public function getDate_of_birth()
    {
        return $this->getData('date_of_birth');
    }
    public function setDate_of_birth($date)
    {
        return $this->setData('date_of_birth', $date);
    }
    public function getGender()
    {
        return $this->getData('gender');
    }
    public function setGender($gender)
    {
        return $this->setData('gender', $gender);
    }
    public function getPhone()
    {
        return $this->getData('phone');
    }
    public function setPhone($phone)
    {
        return $this->setData('phone', $phone);
    }
    public function getEmail()
    {
        return $this->getData('email');
    }
    public function setEmail($email)
    {
        return $this->setData('email', $email);
    }
    public function getCollege_university()
    {
        return $this->getData('college_university');
    }
    public function setCollege_university($college_university)
    {
        return $this->setData('college_university', $college_university);
    }
    public function getArea_of_interest()
    {
        return $this->getData('area_of_interest');
    }
    public function setArea_of_interest($area_of_interest)
    {
        return $this->setData('area_of_interest', $area_of_interest);
    }
    public function getComment()
    {
        return $this->getData('comment');
    }
    public function setComment($comment)
    {
        return $this->setData('comment', $comment);
    }
}
