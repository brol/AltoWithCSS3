<?php
# ***** BEGIN LICENSE BLOCK *****
#
# AltoWithCSS3
# Theme by Pierre Van Glabeke
# License: http://creativecommons.org/licenses/by-nc/2.0/fr/
#
# ***** END LICENSE BLOCK *****

if (!defined('DC_CONTEXT_ADMIN')) { return; }

global $core;

//PARAMS

# Translations
l10n::set(dirname(__FILE__).'/locales/'.$_lang.'/main');

# Default values
$default_menu = false;
$default_width = '1024';

# Settings
$my_menu = $core->blog->settings->themes->altowithcss3_menu;
$my_width = $core->blog->settings->themes->altowithcss3_width;

# Width type
$altowithcss3_width_combo = array(
	__('880') => '880',
	__('1024') => '1024'
);

// POST ACTIONS

if (!empty($_POST))
{
	try
	{
		$core->blog->settings->addNamespace('themes');

		# Menu
		if (!empty($_POST['altowithcss3_menu']))
		{
			$my_menu = $_POST['altowithcss3_menu'];


		} elseif (empty($_POST['altowithcss3_menu']))
		{
			$my_menu = $default_menu;

		}
		$core->blog->settings->themes->put('altowithcss3_menu',$my_menu,'boolean', 'Display simpleMenu',true);

		# Width type
		if (!empty($_POST['altowithcss3_width']) && in_array($_POST['altowithcss3_width'],$altowithcss3_width_combo))
		{
			$my_width = $_POST['altowithcss3_width'];

		} elseif (empty($_POST['altowithcss3_width']))
		{
			$my_width = $default_width;

		}
		$core->blog->settings->themes->put('altowithcss3_width',$my_width,'string','Width to display',true);

		// Blog refresh
		$core->blog->triggerBlog();

		// Template cache reset
		$core->emptyTemplatesCache();

		dcPage::success(__('Theme configuration has been successfully updated.'),true,true);
	}
	catch (Exception $e)
	{
		$core->error->add($e->getMessage());
	}
}

// DISPLAY

# Menu
echo
'<div class="fieldset"><h4>'.__('Customizations').'</h4>'.
'<p>'.
	form::checkbox('altowithcss3_menu',1,$my_menu).
	'<label class="classic" for="altowithcss3_menu">'.
		__('Display simpleMenu').
	'</label>'.
'</p>';

# Width type
echo
'<p class="field"><label>'.__('Display width:').'</label>'.
form::combo('altowithcss3_width',$altowithcss3_width_combo,$my_width).
'</p>'.
'</div>';