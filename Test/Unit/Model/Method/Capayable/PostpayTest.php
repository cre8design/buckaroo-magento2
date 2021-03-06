<?php
/**
 *
 *          ..::..
 *     ..::::::::::::..
 *   ::'''''':''::'''''::
 *   ::..  ..:  :  ....::
 *   ::::  :::  :  :   ::
 *   ::::  :::  :  ''' ::
 *   ::::..:::..::.....::
 *     ''::::::::::::''
 *          ''::''
 *
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Creative Commons License.
 * It is available through the world-wide-web at this URL:
 * http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
 * If you are unable to obtain it through the world-wide-web, please send an email
 * to support@tig.nl so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this module to newer
 * versions in the future. If you wish to customize this module for your
 * needs please contact support@tig.nl for more information.
 *
 * @copyright   Copyright (c) Total Internet Group B.V. https://tig.nl/copyright
 * @license     http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
 */
namespace TIG\Buckaroo\Test\Unit\Model\Method\Capayable;

use TIG\Buckaroo\Model\Method\Capayable\Postpay;
use TIG\Buckaroo\Test\BaseTest;

class PostpayTest extends BaseTest
{
    protected $instanceClass = Postpay::class;

    public function testGetCode()
    {
        $instance = $this->getInstance();
        $result = $instance->getCode();

        $this->assertEquals('tig_buckaroo_capayablepostpay', $result);
    }

    public function testPaymentMethodCode()
    {
        $instance = $this->getInstance();
        $result = $instance->buckarooPaymentMethodCode;

        $this->assertEquals('capayablepostpay', $result);
    }

    public function testServiceAction()
    {
        $instance = $this->getInstance();
        $result = $instance::CAPAYABLE_ORDER_SERVICE_ACTION;

        $this->assertEquals('Pay', $result);
    }
}
