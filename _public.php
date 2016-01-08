<?php
# ***** BEGIN LICENSE BLOCK *****
#
# AltoWithCSS3
# Theme by Pierre Van Glabeke
# License: http://creativecommons.org/licenses/by-nc/2.0/fr/
#
# ***** END LICENSE BLOCK *****
if (!defined('DC_RC_PATH')) { return; }

l10n::set(dirname(__FILE__).'/locales/'.$_lang.'/main');

# appel css menu
$core->addBehavior('publicHeadContent','altowithcss3menu_publicHeadContent');

function altowithcss3menu_publicHeadContent($core)
{
	$style = $core->blog->settings->themes->altowithcss3_menu;
	if (!preg_match('/^menu|simplemenu|menuno$/',$style)) {
		$style = 'simplemenu';
	}

	$url = $core->blog->settings->system->themes_url.'/'.$core->blog->settings->system->theme;
	echo '<link rel="stylesheet" type="text/css" media="screen" href="'.$url."/css/menu/".$style.".css\" />\n";
}

# appel css largeurs (1024.css ou 880.css)
$core->addBehavior('publicHeadContent','altowithcss3width_publicHeadContent');

function altowithcss3width_publicHeadContent($core)
{
	$style = $core->blog->settings->themes->altowithcss3_width;
	if (!preg_match('/^880|1024$/',$style)) {
		$style = '1024';
	}

	$url = $core->blog->settings->system->themes_url.'/'.$core->blog->settings->system->theme;
	echo '<link rel="stylesheet" type="text/css" media="screen" href="'.$url."/css/width/".$style.".css\" />\n";
}