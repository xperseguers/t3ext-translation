<?php
/*
 * This file is part of the TYPO3 CMS project and originates from
 * the Neos.Flow package from the Neos Project - www.neos.io.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with TYPO3 source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace Neos\Flow\I18n\Formatter;

use Neos\Flow\I18n\Locale;

/**
 * An interface for formatters.
 *
 * @api
 */
interface FormatterInterface
{
    /**
     * Formats provided value using optional style properties
     *
     * @param mixed $value Formatter-specific variable to format (can be integer, \DateTime, etc)
     * @param Locale $locale Locale to use
     * @param array $styleProperties Integer-indexed array of formatter-specific style properties (can be empty)
     * @return string String representation of $value provided, or (string)$value
     * @api
     */
    public function format($value, Locale $locale, array $styleProperties = []);
}
