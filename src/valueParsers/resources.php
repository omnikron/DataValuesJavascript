<?php
/**
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 * @author Daniel Werner < daniel.werner@wikimedia.de >
 *
 * @codeCoverageIgnoreStart
 */
return call_user_func( function() {
	$remoteExtPathParts = explode(
		DIRECTORY_SEPARATOR . 'extensions' . DIRECTORY_SEPARATOR, __DIR__, 2
	);

	$moduleTemplate = array(
		'localBasePath' => __DIR__,
		'remoteExtPath' => $remoteExtPathParts[1],
	);

	return array(

		'mw.ext.valueParsers' => $moduleTemplate + array(
			'scripts' => array(
				'mw.ext.valueParsers.js',
			),
			'dependencies' => array(
				'dataValues.values',
				'mediawiki',
				'valueParsers',
				'valueParsers.parsers',
				'valueParsers.ValueParserFactory',
			),
		),

		'valueParsers' => $moduleTemplate + array(
			'scripts' => array(
				'valueParsers.js',
			),
		),

		'valueParsers.ValueParser' => $moduleTemplate + array(
			'scripts' => array(
				'parsers/ValueParser.js',
			),
			'dependencies' => array(
				'jquery',
				'util.inherit',
				'valueParsers',
			),
		),

		'valueParsers.ValueParserFactory' => $moduleTemplate + array(
			'scripts' => array(
				'ValueParserFactory.js',
			),
			'dependencies' => array(
				'jquery',
				'valueParsers',
			),
		),

		'valueParsers.parsers' => $moduleTemplate + array(
			'scripts' => array(
				'parsers/BoolParser.js',
				'parsers/FloatParser.js',
				'parsers/IntParser.js',
				'parsers/NullParser.js',
				'parsers/StringParser.js',
				'parsers/TimeParser.js',
			),
			'dependencies' => array(
				'dataValues.values',
				'jquery',
				'time.js', // required by TimeParser
				'util.inherit',
				'valueParsers.ValueParser',
			),
		),

	);

} );
