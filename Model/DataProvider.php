<?php

/**
 * @author      Webjump Core Team <dev@webjump.com.br>
 * @copyright   2020 Webjump (http://www.webjump.com.br)
 * @license     http://www.webjump.com.br  Copyright
 *
 * @link        http://www.webjump.com.br
 */
namespace Adyen\PaymentGraphQl\Model;

use Magento\Framework\GraphQl\Exception\GraphQlInputException;
use Magento\QuoteGraphQl\Model\Cart\Payment\AdditionalDataProviderInterface;

/**
 * Adyen Dataprovider
 */
class DataProvider implements AdditionalDataProviderInterface
{
    private const PATH_ADDITIONAL_DATA = 'adyen_cc';

    /**
     * Array Manager
     *
     * @var \Magento\Framework\Stdlib\ArrayManager
     **/
    private $arrayManager;

    /**
     * Constructor
     *
     * @param \Magento\Framework\Stdlib\ArrayManager $arrayManager
     */
    public function __construct(
        \Magento\Framework\Stdlib\ArrayManager $arrayManager
    ) {
        $this->arrayManager = $arrayManager;
    }

    /**
     * Return Additional Data
     *
     * @param array $data
     * @return array
     */
    public function getData($data): array
    {
        if (empty($data[self::PATH_ADDITIONAL_DATA])) {
            throw new GraphQlInputException(
                __('Required parameter "adyen_cc" for "payment_method" is missing.')
            );
        }

        return $this->arrayManager->get(self::PATH_ADDITIONAL_DATA, $data);
    }
}
