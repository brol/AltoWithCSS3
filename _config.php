<?php
# ***** BEGIN LICENSE BLOCK *****
#
# AltoWithCSS3
# Theme by Pierre Van Glabeke
# License: http://creativecommons.org/licenses/by-nc/2.0/fr/
#
# ***** END LICENSE BLOCK *****
if (!defined('DC_CONTEXT_ADMIN')) { return; }

// chargement de la traduction
l10n::set(dirname(__FILE__).'/locales/'.$_lang.'/main');

#afficher menu
$menu = $core->blog->settings->themes->altowithcss3_menu;

if (!empty($_POST))
{
	$core->blog->settings->addNameSpace('themes');
	$core->blog->settings->themes->put('altowithcss3_menu',
			!empty($_POST['altowithcss3_menu']),
			'boolean', 'Display simpleMenu');

	# update setting
	$menu = (!empty($_POST['altowithcss3_menu']));

	$core->blog->triggerBlog();

	dcPage::success(__('Theme configuration has been successfully updated.'));
}

echo
'<div class="fieldset"><h4>'.__('Customizations').'</h4>'.
 '<p>'.
	form::checkbox('altowithcss3_menu',1,$menu).
	'<label class="classic" for="altowithcss3_menu">'.
		__('Display simpleMenu').
	'</label>'.
'</p>';

// affichage de la largeur de page
$altowithcss3_widths = array(
	__('880') => '880',
	__('1024') => '1024'
);

if (!$core->blog->settings->themes->altowithcss3_width) {
	$core->blog->settings->themes->altowithcss3_width = '1024';
}

if (!empty($_POST['altowithcss3_width']) && in_array($_POST['altowithcss3_width'],$altowithcss3_widths))
{
	$core->blog->settings->themes->altowithcss3_width = $_POST['altowithcss3_width'];
	$core->blog->settings->addNamespace('themes');
	$core->blog->settings->themes->put('altowithcss3_width',$core->blog->settings->themes->altowithcss3_width,'string','Display width',true);
	$core->blog->triggerBlog();
}

echo
'<p class="field"><label>'.__('Display width:').'</label>'.
form::combo('altowithcss3_width',$altowithcss3_widths,$core->blog->settings->themes->altowithcss3_width).
'</p>'.
'</div>';
