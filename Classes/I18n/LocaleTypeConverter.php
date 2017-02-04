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

namespace Neos\Flow\I18n;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Property\PropertyMappingConfigurationInterface;
use Neos\Flow\Property\TypeConverter\AbstractTypeConverter;

/**
 * Converter which transforms strings to a Locale object.
 *
 * @api
 * @Flow\Scope("singleton")
 */
class LocaleTypeConverter extends AbstractTypeConverter
{
    /**
     * @var string
     */
    protected $sourceTypes = ['string'];

    /**
     * @var string
     */
    protected $targetType = \Neos\Flow\I18n\Locale::class;

    /**
     * @var integer
     */
    protected $priority = 1;

    /**
     * Convert the given $source (a locale identifier string) to $targetType (Locale)
     *
     * @param string $source the locale string
     * @param Locale $targetType
     * @param array $convertedChildProperties
     * @param PropertyMappingConfigurationInterface $configuration
     * @return Locale
     * @api
     */
    public function convertFrom($source, $targetType, array $convertedChildProperties = [], PropertyMappingConfigurationInterface $configuration = null)
    {
        return new Locale($source);
    }
}
