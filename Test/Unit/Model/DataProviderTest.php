<?php

/**
 *
 * Authorizenet Data Provider Test.php
 *
 * @author      Webjump Core Team <dev@webjump.com.br>
 * @copyright   2020 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 */

namespace Adyen\PaymentGraphQl\Test\Unit\Model;

use Adyen\PaymentGraphQl\Model\DataProvider;

class DataProviderTest extends \PHPUnit\Framework\TestCase
{
    private $model;

    protected function setUp()
    {
        $objectManager = new \Magento\Framework\TestFramework\Unit\Helper\ObjectManager($this);

        $this->arrayManager = $this->createMock(\Magento\Framework\Stdlib\ArrayManager::class);

        $this->model = $objectManager->getObject(
            DataProvider::class,
            [
                'arrayManager' => $this->arrayManager
            ]
        );
    }

    /** @test */
    public function testGetDataShouldReturnDataInformationFormated()
    {
        // prepare the test

        $data = [
            "adyen_cc" => ['info' => true]
        ];

        $additionalData = [];

        $this->arrayManager->expects($this->once())
            ->method('get')
            ->willReturn($additionalData);

        // perform the changes

        $result = $this->model->getData($data);

        // test the results

        static::assertEquals($additionalData, $result);
    }

    /**
     * @expectedException Magento\Framework\GraphQl\Exception\GraphQlInputException
     */
    public function testGetDataWithInvalidCodeShouldReturnException()
    {
        // prepare the test

        $data = [];

        // perform the changes

        $this->model->getData($data);

        // test the results

        $this->fail('Should return Exception');
    }
}
