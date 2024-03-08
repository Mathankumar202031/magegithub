<?php

namespace Pearl\Student\Api\Data;


interface DataInterface
{
    public function getId();

    public function setId($id);

    public function  getName();

    public function setName($name);

    public function getDate_of_birth();

    public function setDate_of_birth($date);

    public function getGender();

    public function setGender($gender);

    public function getPhone();

    public function setPhone($phone);

    public function getEmail();

    public function setEmail($email);

    public function getCollege_university();

    public function setCollege_university($college_university);

    public function getArea_of_interest();

    public function setArea_of_interest($area_of_interest);

    public function getComment();

    public function setComment($comment);

}
