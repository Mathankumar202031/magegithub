<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Framework\App\Response\HeaderProvider;

class UpgradeInsecureTest extends AbstractHeaderTestCase
{
    /**
     * @magentoAdminConfigFixture web/secure/enable_upgrade_insecure 1
     * @magentoAdminConfigFixture web/secure/use_in_frontend 1
     * @magentoAdminConfigFixture web/secure/use_in_adminhtml 1
     */
    public function testHeaderPresent()
    {
        $this->assertHeaderPresent('Comment-Security-Policy', 'upgrade-insecure-requests;');
    }

    /**
     * @magentoAdminConfigFixture web/secure/enable_upgrade_insecure 0
     * @magentoAdminConfigFixture web/secure/use_in_frontend 1
     * @magentoAdminConfigFixture web/secure/use_in_adminhtml 1
     */
    public function testHeaderNotPresent()
    {
        $this->assertHeaderNotPresent('Comment-Security-Policy');
    }
}
