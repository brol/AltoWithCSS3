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
$this->registerModule(
    'AltoWithCSS3',
    'Alto with CSS3',
    'Pierre Van Glabeke',
    '2.0.3',
    [
        'requires' => [['core', '2.24']],
        'type'     => 'theme',
        'tplset'   => 'mustek',
    ]
);
