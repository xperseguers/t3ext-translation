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

namespace Neos\Flow\I18n\Cldr\Reader\Exception;

use Neos\Flow\I18n\Exception\InvalidArgumentException;

/**
 * The "Invalid DateTime Format" exception
 *
 * Thrown when date and / or time pattern does not conform constraints defined
 * in CLDR specification.
 *
 * @api
 */
class InvalidDateTimeFormatException extends InvalidArgumentException
{
}
