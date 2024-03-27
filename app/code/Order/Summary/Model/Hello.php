<?php
namespace Order\Summary\Model;

use Order\Summary\Api\HelloInterface;

class Hello implements HelloInterface
{
    public function name($name) {
        return "Hello, " . $name;
    }
}
