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
use Neos\Flow\I18n;

/**
 * The Detector class provides methods for automatic locale detection
 *
 * @Flow\Scope("singleton")
 * @api
 */
class Detector
{
    /**
     * @var I18n\Service
     */
    protected $localizationService;

    /**
     * A collection of Locale objects representing currently installed locales,
     * in a hierarchical manner.
     *
     * @var LocaleCollection
     */
    protected $localeCollection;

    /**
     * @param I18n\Service $localizationService
     * @return void
     */
    public function injectLocalizationService(I18n\Service $localizationService)
    {
        $this->localizationService = $localizationService;
    }

    /**
     * @param LocaleCollection $localeCollection
     * @return void
     */
    public function injectLocaleCollection(LocaleCollection $localeCollection)
    {
        $this->localeCollection = $localeCollection;
    }

    /**
     * Returns best-matching Locale object based on the Accept-Language header
     * provided as parameter. System default locale will be returned if no
     * successful matches were done.
     *
     * @param string $acceptLanguageHeader The Accept-Language HTTP header
     * @return Locale Best-matching existing Locale instance
     * @api
     */
    public function detectLocaleFromHttpHeader($acceptLanguageHeader)
    {
        $acceptableLanguages = I18n\Utility::parseAcceptLanguageHeader($acceptLanguageHeader);

        if ($acceptableLanguages === false) {
            return $this->localizationService->getConfiguration()->getDefaultLocale();
        }

        foreach ($acceptableLanguages as $languageIdentifier) {
            if ($languageIdentifier === '*') {
                return $this->localizationService->getConfiguration()->getDefaultLocale();
            }

            try {
                $locale = new Locale($languageIdentifier);
            } catch (Exception\InvalidLocaleIdentifierException $exception) {
                continue;
            }

            $bestMatchingLocale = $this->localeCollection->findBestMatchingLocale($locale);

            if ($bestMatchingLocale !== null) {
                return $bestMatchingLocale;
            }
        }

        return $this->localizationService->getConfiguration()->getDefaultLocale();
    }

    /**
     * Returns best-matching Locale object based on the locale identifier
     * provided as parameter. System default locale will be returned if no
     * successful matches were done.
     *
     * @param string $localeIdentifier The locale identifier as used in Locale class
     * @return Locale Best-matching existing Locale instance
     * @api
     */
    public function detectLocaleFromLocaleTag($localeIdentifier)
    {
        try {
            return $this->detectLocaleFromTemplateLocale(new Locale($localeIdentifier));
        } catch (Exception\InvalidLocaleIdentifierException $exception) {
            return $this->localizationService->getConfiguration()->getDefaultLocale();
        }
    }

    /**
     * Returns best-matching Locale object based on the template Locale object
     * provided as parameter. System default locale will be returned if no
     * successful matches were done.
     *
     * @param Locale $locale The template Locale object
     * @return Locale Best-matching existing Locale instance
     * @api
     */
    public function detectLocaleFromTemplateLocale(Locale $locale)
    {
        $bestMatchingLocale = $this->localeCollection->findBestMatchingLocale($locale);

        if ($bestMatchingLocale !== null) {
            return $bestMatchingLocale;
        }

        return $this->localizationService->getConfiguration()->getDefaultLocale();
    }
}
