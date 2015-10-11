<?php
/**
 * d20 Plus Theme
 *
 * @file
 * @ingroup Skins
 * @author Randy Oest (oestii@yahoo.com)
 * @license None
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This is an extension to the MediaWiki package and cannot be run standalone.' );
}

$wgExtensionCredits['skin'][] = array(
	'path' => __FILE__,
	'name' => 'd20 Plus Theme', // name as shown under [[Special:Version]]
	'namemsg' => 'd20plus', // used since MW 1.24, see the section on "Localisation messages" below
	'version' => '1.0',
	'url' => 'http://drinkinganddragons.com',
	'author' => 'Randy Oest',
	'descriptionmsg' => 'Theme by Randy Oest', // see the section on "Localisation messages" below
	'license' => 'None',
);

$wgValidSkinNames['d20plus'] = 'd20plus';

$wgAutoloadClasses['Skind20plus'] = __DIR__ . '/d20plus.skin.php';
$wgMessagesDirs['d20plus'] = __DIR__ . '/i18n';

$wgResourceModules['skins.foobar.js'] = array(
	'scripts' => array(
		'd20plus/js/main.js'
	),
	'remoteBasePath' => &$GLOBALS['wgStylePath'],
	'localBasePath' => &$GLOBALS['wgStyleDirectory'],
);