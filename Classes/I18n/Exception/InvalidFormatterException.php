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

namespace Neos\Flow\I18n\Exception;

use Neos\Flow\I18n;

/**
 * The "Unsatisfactory Formatter" exception
 *
 * Thrown when the I18n's FormatResolver was able to retrieve a formatter at all,
 * but did not satisfy (i.e. implement) the FormatterInterface.
 *
 * @api
 */
class InvalidFormatterException extends I18n\Exception
{
}
