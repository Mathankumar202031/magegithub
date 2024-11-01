<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/* MassDelete attribute with text_attribute code */
$registry = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->get(\Magento\Framework\Registry::class);
$registry->unregister('isSecureArea');
$registry->register('isSecureArea', true);

/** @var $attribute \Magento\Catalog\Model\ResourceModel\Eav\Attribute */
$attribute = \Magento\TestFramework\Helper\Bootstrap::getObjectManager()->create(
    \Magento\Catalog\Model\ResourceModel\Eav\Attribute::class
);
$attribute->load('text_attribute', 'attribute_code');
$attribute->delete();

$registry->unregister('isSecureArea');
$registry->register('isSecureArea', false);
