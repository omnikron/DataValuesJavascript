<?php

if ( defined( 'DATA_VALUES_JAVASCRIPT_VERSION' ) ) {
	// Do not initialize more than once.
	return 1;
}

define( 'DATA_VALUES_JAVASCRIPT_VERSION', '0.1 alpha' );

$GLOBALS['wgExtensionCredits']['datavalues'][] = array(
	'path' => __DIR__,
	'name' => 'DataValues Javascript',
	'version' => DATA_VALUES_JAVASCRIPT_VERSION,
	'author' => array(
		'[https://www.mediawiki.org/wiki/User:Danwe Daniel Werner]',
		'[http://www.snater.com H. Snater]',
		'[https://www.mediawiki.org/wiki/User:Jeroen_De_Dauw Jeroen De Dauw]',
	),
);

// Resource Loader module registration
$GLOBALS['wgResourceModules'] = array_merge(
	$GLOBALS['wgResourceModules'],
	include( __DIR__ . '/DataValues.resources.mw.php' ),
	include( __DIR__ . '/js/ValueParsers.resources.mw.php' )
);

// API module registration
$GLOBALS['wgAPIModules']['parsevalue'] = 'ValueParsers\ApiParseValue';

/**
 * Hook for registering QUnit test cases.
 * @see https://www.mediawiki.org/wiki/Manual:Hooks/ResourceLoaderTestModules
 * @since 0.1
 *
 * @param array &$testModules
 * @param \ResourceLoader &$resourceLoader
 * @return boolean
 */
$GLOBALS['wgHooks']['ResourceLoaderTestModules'][] = function ( array &$testModules, \ResourceLoader &$resourceLoader ) {
	// Register DataValue QUnit tests. Take the predefined test definitions and make them
	// suitable for registration with MediaWiki's resource loader.
	$ownModules = include( __DIR__ . '/DataValues.tests.qunit.php' );
	$ownModulesTemplate = array(
		'localBasePath' => __DIR__,
		'remoteExtPath' =>  'DataValuesJavascript',
	);
	foreach( $ownModules as $ownModuleName => $ownModule ) {
		$testModules['qunit'][ $ownModuleName ] = $ownModule + $ownModulesTemplate;
	}
	return true;
};

/**
 * Hook to add QUnit test cases.
 * @see https://www.mediawiki.org/wiki/Manual:Hooks/ResourceLoaderTestModules
 * @since 0.1
 *
 * @param array &$testModules
 * @param \ResourceLoader &$resourceLoader
 * @return boolean
 */
$GLOBALS['wgHooks']['ResourceLoaderTestModules'][] = function ( array &$testModules, \ResourceLoader &$resourceLoader ) {
	// @codeCoverageIgnoreStart
	$moduleTemplate = array(
		'localBasePath' => __DIR__ . '/js/tests/ValueParsers',
		'remoteExtPath' => 'DataValuesJavascript/js/tests/ValueParsers',
	);

	$testModules['qunit']['ext.valueParsers.tests'] = $moduleTemplate + array(
			'scripts' => array(
				'ValueParser.tests.js',
			),
			'dependencies' => array(
				'valueParsers.parsers',
			),
		);

	$testModules['qunit']['ext.valueParsers.factory'] = $moduleTemplate + array(
			'scripts' => array(
				'ValueParserFactory.tests.js',
			),
			'dependencies' => array(
				'qunit.parameterize',
				'valueParsers.factory',
				'valueParsers.parsers',
			),
		);

	$testModules['qunit']['ext.valueParsers.parsers'] = $moduleTemplate + array(
			'scripts' => array(
				'parsers/BoolParser.tests.js',
				'parsers/GlobeCoordinateParser.tests.js',
				'parsers/FloatParser.tests.js',
				'parsers/IntParser.tests.js',
				'parsers/StringParser.tests.js',
				'parsers/TimeParser.tests.js',
				'parsers/QuantityParser.tests.js',
				'parsers/NullParser.tests.js',
			),
			'dependencies' => array(
				'ext.valueParsers.tests',
			),
		);

	return true;
	// @codeCoverageIgnoreEnd
};
