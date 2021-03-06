<?php
# This file was automatically generated by the MediaWiki 1.33.0
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# https://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}


## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename = "Drinking and Dragons";
$wgMetaNamespace = "Drinking_and_Dragons";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = "/w";
$wgArticlePath = "/wiki/$1";

## The protocol and server name to use in fully-qualified URLs
$wgServer = "https://drinkinganddragons.com";

## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

## The URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo = "$wgResourceBasePath/resources/assets/wiki.png";

## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO

$wgEmergencyContact = "apache@drinkinganddragons.com";
$wgPasswordSender = "apache@drinkinganddragons.com";

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype = "mysql";
$wgDBserver = "database.randyoest.com";
$wgDBname = "drinkinganddragons_wiki2";
$wgDBuser = "wikidb_user";
$wgDBpassword = "dungaree-laundry-maltreat-mow";

// $wgDBtype = "mysql";
// $wgDBserver = "database";
// $wgDBname = "lamp";
// $wgDBuser = "lamp";
// $wgDBpassword = "lamp";

# MySQL specific settings
$wgDBprefix = "lrc_wiki";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

## Shared memory settings
$wgMainCacheType = CACHE_NONE;
$wgMemCachedServers = [];

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = false;

# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = true;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "C.UTF-8";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publicly accessible from the web.
#$wgCacheDirectory = "$IP/cache";

# Site language code, should be one of the list in ./languages/data/Names.php
$wgLanguageCode = "en";

$wgSecretKey = "c73ab2f30a35dab0271d679ba122f05e1a19966553e2bbc23698958a1896c6b7";

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = "d1b62538a3b35ca9";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'vector', 'monobook':
$wgDefaultSkin = "DrinkingAndDragons";

# Enabled skins.
# The following skins were automatically enabled:
wfLoadSkin( 'CologneBlue' );
wfLoadSkin( 'DrinkingAndDragons' );
wfLoadSkin( 'Example' );
wfLoadSkin( 'Modern' );
wfLoadSkin( 'MonoBook' );
wfLoadSkin( 'Vector' );


# End of automatically generated settings.
# Add more configuration options below.

// Namespaces
// ======================================================
$wgExtraNamespaces = array(
	100 => "A",
	101 => "A_talk",
	102 => "IK",
	103 => "IK_talk",
	104 => "DS",
	105 => "DS_talk",
	106 => "Disposable",
	107 => "Disposable_talk",
	108 => "Wild",
	109 => "Wild_talk",
	110 => "LRC",
	111 => "LRC_talk",
	112 => "NW",
	113 => "NW_talk",
	114 => "L",
	115 => "L_talk",
	116 => "Brew",
	117 => "Brew_talk",
	118 => "D",
	119 => "D_talk",
	120 => "Vat",
	121 => "Vat_talk",
	122 => "rPitt",
	123 => "rPitt_talk",
	124 => "Rise",
	125 => "Rise_talk",
	126 => "Duck",
	127 => "Duck_talk",
	128 => "DW",
	129 => "DW_talk",
	130 => "ROR",
	131 => "ROR_talk",
	132 => "FF",
	133 => "FF_talk",
	134 => "ShotC",
	135 => "ShotC_talk",
  136 => "C",
  137 => "C_talk",
  138 => "RPM",
  139 => "RPM_talk",
  140 => "13A",
  141 => "13A_talk",
  142 => "P",
  143 => "P_talk",
  144 => "Hex",
  145 => "Hex_talk"
);

$wgNamespacesWithSubpages = array(
	NS_TALK           	=> true,
	NS_USER           	=> true,
	NS_USER_TALK      	=> true,
	NS_PROJECT_TALK   	=> true,
	NS_IMAGE_TALK     	=> true,
	NS_MEDIAWIKI_TALK 	=> true,
	NS_TEMPLATE_TALK  	=> true,
	NS_HELP_TALK      	=> true,
	NS_CATEGORY_TALK  	=> true,
    100  				=> true,
    101  				=> true,
    102  				=> true,
    103  				=> true,
    104  				=> true,
    105  				=> true,
    106  				=> true,
    107  				=> true,
    108  				=> true,
    109  				=> true,
    110  				=> true,
    111  				=> true,
    112  				=> true,
    113  				=> true,
    114  				=> true,
    115  				=> true,
    116  				=> true,
    117  				=> true,
    118  				=> true,
    119  				=> true,
    120  				=> true,
    121  				=> true,
    122  				=> true,
    123  				=> true,
    124  				=> true,
    125  				=> true,
    126  				=> true,
    127  				=> true,
    128  				=> true,
    129  				=> true,
    130  				=> true,
    131  				=> true,
    132  				=> true,
    133  				=> true,
    134  				=> true,
    135  				=> true,
    136         => true,
    137         => true,
    138         => true,
    139         => true,
    140         => true,
    141         => true,
    142         => true,
    143         => true
);

$wgNamespacesToBeSearchedDefault = array(
	-125                => false,
	NS_MAIN           	=> true,
	NS_USER           	=> false,
	NS_USER_TALK      	=> false,
	NS_PROJECT_TALK   	=> false,
	NS_IMAGE_TALK     	=> true,
	NS_IMAGE_TALK     	=> false,
	NS_TEMPLATE_TALK  	=> false,
	NS_HELP_TALK      	=> false,
	NS_CATEGORY_TALK  	=> false,
	100               	=> false,
	101               	=> false,
	102  			 	=> false,
	103  			 	=> false,
	104  				=> true,
	105  				=> true,
	106  				=> true,
	107  				=> true,
	108  				=> true,
	109  				=> true,
	110  				=> true,
	111  				=> true,
	112  				=> true,
	113  				=> true,
	114  				=> true,
	115  				=> true,
	116  				=> true,
	117  				=> true,
	118  				=> true,
	119  				=> true,
	120  				=> true,
	121  				=> true,
	122  				=> true,
	123  				=> true,
	124  				=> true,
	125  				=> true,
	126  				=> true,
	127  				=> true,
	128  				=> true,
	129  				=> true,
  130  				=> true,
  131  				=> true,
  132  				=> true,
  133  				=> true,
  134  				=> true,
  135  				=> true,
  136         => true,
  137         => true,
  138         => true,
  139         => true,
  140         => true,
  141         => true,
	142         => true,
	143         => true
);
// Control access to the wiki
// ======================================================
# Disable anonymous editing
$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['user']['edit'] = true;

# Prevent new user registrations except by sysops
$wgGroupPermissions['*']['createaccount'] = false;

// Permitted file extensions
// ======================================================
$wgFileExtensions = array(
	'doc',
	'docx',
	'gif',
	'jpeg',
	'jpg',
	'mp3',
	'pdf',
	'pdf',
	'png',
	'ppt',
	'psd',
	'svg',
	'swf',
	'xls',
	'zip'
);

// Variables and parsing
// ======================================================
wfLoadExtension( 'ParserFunctions' );
require_once("$IP/extensions/Variables/Variables.php");

// HTMLlets
// ======================================================
require_once("$IP/extensions/HTMLets/HTMLets.php");
$wgHTMLetsDirectory = "$IP/htmlets";


// Dynamic page listing
// ======================================================
include("$IP/extensions/DynamicPageList/DynamicPageList.php");


// Widgets (such as Google Drive docs)
// ======================================================
// require_once("$IP/extensions/Widgets/Widgets.php");
// $wgGroupPermissions['sysop']['editwidgets'] = true;

// TreeAndMenu
// ======================================================
wfLoadExtension('TreeAndMenu');

// Labeled Section Transclusion
// ======================================================
wfLoadExtension( 'LabeledSectionTransclusion' );

// SVG
// ======================================================
$wgSVGConverter = 'ImageMagick';

//  Cookie expiration
// ======================================================
$wgCookieExpiration = 180 * 86400;

// iframe - https://www.mediawiki.org/wiki/Extension:Iframe
// ======================================================
wfLoadExtension('Iframe');
$wgIframe['server']['randyoest'] = [ 'scheme' => 'https', 'domain' => 'randyoest.com' ];


// Misc
// ======================================================
$wgCategoryPagingLimit = 500;
$wgAllowExternalImages = true;

// https://www.mediawiki.org/wiki/Snippets/Load_an_additional_JavaScript_or_stylesheet_file_on_all_pages#Scripts_hosted_externally
$wgHooks['BeforePageDisplay'][] = function( OutputPage &$out, Skin &$skin ) {
	$out->addStyle('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap');
};