<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace GadgetCorp\CustomEmailDirective\Model;

use Magento\Framework\Filter\DirectiveProcessor\FilterInterface;

/**
 *  Transform all content to uppercase
 */
class UppercaseFilter implements FilterInterface
{

    /**
     * @inheritDoc
     */
    public function filterValue(string $value, array $params): string
    {
        return mb_strtoupper($value);
    }

    /**
     * @inheritDoc
     */
    public function getName(): string
    {
        return 'uppercase';
    }
}
