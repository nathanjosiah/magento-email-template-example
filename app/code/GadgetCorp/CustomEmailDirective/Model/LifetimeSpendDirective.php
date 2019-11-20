<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace GadgetCorp\CustomEmailDirective\Model;

use Magento\Framework\Filter\SimpleDirective\ProcessorInterface;
use Magento\Framework\Pricing\PriceCurrencyInterface;

/**
 * Calculates the lifetime spend of all customers
 */
class LifetimeSpendDirective implements ProcessorInterface
{
    /**
     * @var PriceCurrencyInterface
     */
    private $priceCurrency;

    /**
     * @param PriceCurrencyInterface $priceCurrency
     */
    public function __construct(PriceCurrencyInterface $priceCurrency)
    {
        $this->priceCurrency = $priceCurrency;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'lifetime_spend';
    }

    /**
     * @inheritDoc
     */
    public function process($value, array $parameters, ?string $html): string
    {
        $shouldBold = !empty($parameters['should_bold']);
        $amount = $this->priceCurrency->getCurrencySymbol() . $this->calculateLifetimeSpend();

        return ($shouldBold ? '<strong>' . $amount . '</strong>' : $amount);
    }

    /**
     * @inheritDoc
     */
    public function getDefaultFilters(): ?array
    {
        // Make sure newlines are converted to <br /> tags by default
        return ['nl2br'];
    }

    /**
     * Calculate the total amount of money spent by all customers for all time
     *
     * @return float
     */
    private function calculateLifetimeSpend(): float
    {
        // Dummy implementation. In a real module this would do a calculation
        return 123.45;
    }
}
