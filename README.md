# DataValues JavaScript

This component is in alpha state and not suitable for reuse yet.
It contains various JavaScript related to the DataValues library.

[![Build Status](https://secure.travis-ci.org/wmde/DataValuesJavascript.png?branch=master)](http://travis-ci.org/wmde/DataValuesJavascript)

On [Packagist](https://packagist.org/packages/data-values/javascript):
[![Latest Stable Version](https://poser.pugx.org/data-values/javascript/version.png)](https://packagist.org/packages/data-values/javascript)
[![Download count](https://poser.pugx.org/data-values/javascript/d/total.png)](https://packagist.org/packages/data-values/javascript)

## TODOs

* Write high level description and documentation in this README file.

## Release notes

### 0.7.0 (dev)

#### Breaking changes
* Renamed `dataValues.UnUnserializableValue` to `dataValues.UnDeserializableValue`.
* Changed constructor parameter order of `dataValues.UnDeserializableValue` (formerly `dataValues.UnUnserializableValue`).
* Removed `time.js` legacy code, including `time.Time` and `time.Parser`. Every "vital" functionality has been ported to `dataValues.TimeValue` which now may be interacted with directly instead of having to retrieve the encapsulated `time.Time` object first.
* Removed obsolete `valueParsers.TimeParser`. Back-end parser is to be used via API.
* Removed obsolete `mw.ext.dataValues` module as it was just overwriting the obsolete `time.js` settings. Dependencies should be updated to point directly to the `dataValues.values` module.

#### Enhancements
* Consolidated code structure, updated and added code documentation to allow generating a proper documentation using JSDuck.

### 0.6.3 (2015-04-01)
* Remove explicit resource loader dependency on jquery.qunit.

### 0.6.1 (2014-11-07)

#### Enhancements
* `Time` object's month and day attributes default to 0 instead of 1 now.
* Fixed `Time.newFromIso8601()`.
* Improved PhantomJS Testrunner, outputs failed assertions on the console now.
* Improved `globeCoordinate.GlobeCoordinate.equals()`

### 0.6.0 (2014-09-01)

#### Breaking changes

* #40 Removed the arbitrary list of precisions for globe coordinates

#### Enhancements

* #44 Fixed comparing time values
* #42 Removed 'to a degree' label, now shown as '±1°'
* #45 Removed constructor naming debugging feature

#### Bugfixes

* Remove ResourceLoader dependencies on jquery and mediawiki (bug 69468)

### 0.5.1 (2014-06-04)

#### Bugfixes

* Don't limit precisions of globe coordinates in the UI (allows display of values with a non predefined precision)

### 0.5.0 (2014-03-28)

#### Breaking changes

* Renamed ValueFormatterFactory to ValueFormatterStore.
* Renamed ValueParserFactory to ValueParserStore.
* Removed mw.ext.valueFormatters and mw.ext.valueParsers.

#### Enhancements

* Defined parameters of the promises returned by ValueFormatter's and ValueParser's format/parse functions.

### 0.4.0 (2014-03-24)

#### Breaking changes

* mw.ext.valueParsers does not register valueParsers.TimeParser anymore
* mw.ext.valueFormatters does not register valueFormatters.StringFormatter anymore
* Renamed ValueFormatterFactory to ValueFormatterStore.
* Renamed ValueParserFactory to ValueParserStore.

#### Bugfixes

* Fixed definitions of ResourceLoader test modules.
* Accept timestamp strings with zeroes as months and days
* Always return a string in time.writeYear and time.writeDay

### 0.3.1 (2014-02-03)

#### Bugfixes

* Fixed valueParsers ResourceLoader module definition template.

### 0.3 (2014-01-30)

#### Breaking changes

* Renamed "valueFormatters.factory" Resource Loader module to "valueFormatters.ValueFormatterFactory"
* Renamed "valueParsers.factory" Resource Loader module to "valueParsers.ValueParserFactory"
* Removed ValueView dependency from "mw.ext.valueFormatters" module and "mw.ext.valueParsers" module.

### 0.2 (2014-01-24)

#### Breaking changes

* #8 Removed dataValues.util.Notifier
* #10 Renamed dataValues.util.inherit to util.inherit
* #13 Removed vp.GlobeCoordinateParser and vp.QuantityParser
* #15 Removed the ParseValue API module

#### Enhancements

* #14 Decoupled the QUnit tests from the MediaWiki resource loader
* #16 Have the tests run on TravisCI using PhantomJS
* #18 Provided QUnit test runner using requireJS

### 0.1 (2013-12-23)

Initial release.
