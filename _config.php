<?php
/**
 * @brief AltoWithCSS3, a theme for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Theme
 *
 * @author Pierre Van Glabeke
 * @copyright http://creativecommons.org/licenses/by-nc/2.0/fr/
 */

if (!defined('DC_CONTEXT_ADMIN')) {
    return;
}

//PARAMS

# Translations
l10n::set(__DIR__ . '/locales/' . dcCore::app()->lang . '/main');

# Default values
$default_menu  = 'simplemenu';
$default_width = '1024';

# Settings
$my_menu  = dcCore::app()->blog->settings->themes->altowithcss3_menu;
$my_width = dcCore::app()->blog->settings->themes->altowithcss3_width;

# Menu type
$altowithcss3_menu_combo = [
    __('simpleMenu') => 'simplemenu',
    __('Menu')       => 'menu',
    __('none')       => 'menuno',
];

# Width type
$altowithcss3_width_combo = [
    __('880')  => '880',
    __('1024') => '1024',
    __('1280') => '1280',
];

// POST ACTIONS

if (!empty($_POST)) {
    try {
        dcCore::app()->blog->settings->addNamespace('themes');

        # Menu type
        if (!empty($_POST['altowithcss3_menu']) && in_array($_POST['altowithcss3_menu'], $altowithcss3_menu_combo)) {
            $my_menu = $_POST['altowithcss3_menu'];
        } elseif (empty($_POST['altowithcss3_menu'])) {
            $my_menu = $default_menu;
        }
        dcCore::app()->blog->settings->themes->put('altowithcss3_menu', $my_menu, 'string', 'Menu to display', true);

        # Width type
        if (!empty($_POST['altowithcss3_width']) && in_array($_POST['altowithcss3_width'], $altowithcss3_width_combo)) {
            $my_width = $_POST['altowithcss3_width'];
        } elseif (empty($_POST['altowithcss3_width'])) {
            $my_width = $default_width;
        }
        dcCore::app()->blog->settings->themes->put('altowithcss3_width', $my_width, 'string', 'Width to display', true);

        // Blog refresh
        dcCore::app()->blog->triggerBlog();

        // Template cache reset
        dcCore::app()->emptyTemplatesCache();

        dcPage::success(__('Theme configuration has been successfully updated.'), true, true);
    } catch (Exception $e) {
        dcCore::app()->error->add($e->getMessage());
    }
}

// DISPLAY

# Menu
echo
'<div class="fieldset"><h4>' . __('Customizations') . '</h4>' .
'<p class="field"><label>' . __('Menu to display:') . '</label>' .
form::combo('altowithcss3_menu', $altowithcss3_menu_combo, $my_menu) .
'</p>' .
'<p class="info">' . __('Plugins menu allowed: <a href="http://plugins.dotaddict.org/dc2/details/menu">Menu</a> plugin or simpleMenu.') . '</p>';

# Width type
echo
'<p class="field"><label>' . __('Display width:') . '</label>' .
form::combo('altowithcss3_width', $altowithcss3_width_combo, $my_width) .
'</p>' .
'</div>';
