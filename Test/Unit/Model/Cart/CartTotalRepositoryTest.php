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
namespace TIG\Buckaroo\Test\Unit\Model\Cart;

use Magento\Framework\App\ProductMetadataInterface;
use TIG\Buckaroo\Model\Cart\CartTotalRepository;
use TIG\Buckaroo\Test\BaseTest;

class CartTotalRepositoryTest extends BaseTest
{
    protected $instanceClass = CartTotalRepository::class;

    public function isCorrectMagentoVersionProvider()
    {
        return [
            'too low version' => ['2.1.4', false],
            'too high version' => ['2.3.1', false],
            'correct version' => ['2.2.3', true],
        ];
    }

    /**
     * @param $version
     * @param $expected
     *
     * @dataProvider isCorrectMagentoVersionProvider
     */
    public function testIsCorrectMagentoVersion($version, $expected)
    {
        $metadataMock = $this->getFakeMock(ProductMetadataInterface::class)
            ->setMethods(['getVersion'])
            ->getMockForAbstractClass();
        $metadataMock->expects($this->once())->method('getVersion')->willReturn($version);

        $instance = $this->getInstance(['productMetadata' => $metadataMock]);
        $result = $this->invoke('isCorrectMagentoVersion', $instance);

        $this->assertEquals($expected, $result);
    }
}
