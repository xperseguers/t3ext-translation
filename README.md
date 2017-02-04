Extended Translations
=====================

This extension provides an API to extend support of translations within TYPO3 v7 and v8.
 
Internationalisation (also known as i18n) is the process of designing software so that it can be
easily (i.e. without any source code modifications) adapted to various languages and regions.
Localisation (also known as L10n) is the process of adapting internationalised software for a
specific language or region (e.g., by translating text, formatting date or time).


## XLIFF message catalogs

The primary source of translations in TYPO3 since version 4.6 are XLIFF message catalogs.
[XLIFF](http://en.wikipedia.org/wiki/XLIFF), the *XML Localisation Interchange File Format* is an
[OASIS-blessed](https://www.oasis-open.org/committees/xliff) standard format for translation.


### File locations and naming

Each TYPO3 extension may contain any number of XLIFF files. The location for these files is the
`Resources/Private/Translations` folder. These files there can be named at will, but keep in mind
that `Main` is the default catalog name. The target locale is then added as a directory hierarchy
in between. The minimum needed to provide message catalogs for the *en* and *de* locales thus would
be:

```
<your-extension-key>/
  Resources/
    Private/
      Translations/
        en/
          Main.xlf
        de/
          Main.xlf
```


### XLIFF file creation

A minimal XLIFF file looks like this:

```
<?xml version="1.0" encoding="UTF-8"?>
<xliff version="1.2" xmlns=urn:oasis:names:tc:xliff:document:1.2">
    <file original="" source-language="da" target-language="fr" datatype="plaintext">
        <body>
            <trans-unit id="danish.celebrity">
                <source>Skarhøj</source>
                <target>Sarkosh</target>
            </trans-unit>
        </body>
    </file>
</xliff>
```

If possible you should set up your editor to use the XLIFF 1.2 strict schema to validate the files
you are working on.


### Plural forms in XLIFF files

Plural forms are also supported in XLIFF. The following example defines a string in two forms that
will be used depending on the count:

```
<?xml version="1.0" encoding="UTF-8"?>
<xliff version="1.2" xmlns=urn:oasis:names:tc:xliff:document:1.2">
    <file original="" source-language="en" target-language="de" datatype="plaintext">
        <body>
            <group id="some.label" restype="x-gettext-plurals">
                <trans-unit id="some.label[0]">
                    <source>This is only {0} item.</source>
                    <target>Dies ist nur {0} Element.</target>
                </trans-unit>
                <trans-unit id="some.label[1]">
                    <source>These are {0} items.</source>
                    <target>Dies sind {0} Elemente.</target>
                </trans-unit>
            </group>
        </body>
    </file>
</xliff>
```

Please be aware that the number of the available plural forms depends on the language! If you want
to find out which plural forms are available for a locale you can have a look at
`EXT:translation/Resources/Private/I18n/CLDR/Sources/supplemental/plurals.xml`.


### XLIFF file translation

To translate XLIFF files you can use any text editor, but translation is a lot easier using one the
available translation tools. To name two of them: Virtaal is a free and open-source tool for offline
use and Pootle (both from the [Translate Toolkit](http://toolkit.translatehouse.org/) project) is a
web-based translation server.

XLIFF can also easily be converted to PO file format, edited by well known PO editors (like *Poedit*,
which supports plural forms), and converted back to XLIFF format. The *xliff2po* and *po2xliff* tools
from the Translate Toolkit project can convert without information loss.


## Credits

- [Flow Framework](https://flowframework.readthedocs.io/en/stable/TheDefinitiveGuide/PartIII/Internationalization.html)
