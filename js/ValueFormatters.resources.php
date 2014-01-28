<?php
/**
 * Definition of ResourceLoader modules of the ValueFormatters extension.
 * When included this returns an array with all the modules introduced by ValueFormatters.
 *
 * @since 0.1
 *
 * @licence GNU GPL v2+
 * @author H. Snater < mediawiki@snater.com >
 *
 * @codeCoverageIgnoreStart
 */
return call_user_func( function() {
	$remoteExtPathParts = explode( DIRECTORY_SEPARATOR . 'extensions' . DIRECTORY_SEPARATOR , __DIR__, 2 );

	$moduleTemplate = array(
		'localBasePath' => __DIR__ . '/src/ValueFormatters',
		'remoteExtPath' =>  $remoteExtPathParts[1] . '/src/ValueFormatters',
	);

	return array(

		'valueFormatters' => $moduleTemplate + array(
			'scripts' => array(
				'valueFormatters.js',
			),
		),

		'valueFormatters.ValueFormatter' => $moduleTemplate + array(
			'scripts' => array(
				'formatters/ValueFormatter.js',
			),
			'dependencies' => array(
				'valueFormatters',
				'valueFormatters.util',
			),
		),

		'valueFormatters.factory' => $moduleTemplate + array(
			'scripts' => array(
				'ValueFormatterFactory.js',
			),
			'dependencies' => array(
				'dataTypes',
				'valueFormatters',
			),
		),

		'valueFormatters.formatters' => $moduleTemplate + array(
			'scripts' => array(
				'formatters/NullFormatter.js',
				'formatters/StringFormatter.js',
			),
			'dependencies' => array(
				'dataValues.values',
				'valueFormatters.ValueFormatter',
			),
		),

		'valueFormatters.util' => $moduleTemplate + array(
				'scripts' => array(
					'valueFormatters.util.js',
				),
				'dependencies' => array(
					'dataValues.util',
					'valueFormatters',
				),
			),

	);

} );
