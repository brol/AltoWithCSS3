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

if (!defined('DC_RC_PATH')) {
    return;
}

l10n::set(__DIR__ . '/locales/' . dcCore::app()->lang . '/main');

# appel css menu
dcCore::app()->addBehavior('publicHeadContent', 'altowithcss3_publicHeadContent');

function altowithcss3_publicHeadContent()
{
    // menu
    $style = dcCore::app()->blog->settings->themes->altowithcss3_menu;
    if (!preg_match('/^menu|simplemenu|menuno$/', (string) $style)) {
        $style = 'simplemenu';
    }

    $url = dcCore::app()->blog->settings->system->themes_url . '/' . dcCore::app()->blog->settings->system->theme;
    echo '<link rel="stylesheet" type="text/css" media="screen" href="' . $url . '/css/' . $style . ".css\" />\n";

    // width
    $style = dcCore::app()->blog->settings->themes->altowithcss3_width;
    if (!preg_match('/^880|1024|1280$/', (string) $style)) {
        $style = '1024';
    }

    $url = dcCore::app()->blog->settings->system->themes_url . '/' . dcCore::app()->blog->settings->system->theme;
    echo '<link rel="stylesheet" type="text/css" media="screen" href="' . $url . '/css/' . $style . ".css\" />\n";
}
