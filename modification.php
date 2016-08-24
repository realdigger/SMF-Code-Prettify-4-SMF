<?php
/**
 * @package SMF Code Prettify 4 SMF
 * @author digger
 * @copyright 2011-2016 http://mysmf.ru
 * @license Apache License 2.0
 * @version 1.0
 *
 * To run this install manually please make sure you place this
 * in the same place and SSI.php and index.php
 */

global $boardurl, $boarddir, $modSettings, $sourcedir, $smcFunc, $context;

$hooks = array(
    'integrate_pre_include' => '$sourcedir/CodePrettify.php',
    'integrate_load_theme' => 'loadCodePrettify',
    'integrate_bbc_codes' => 'bbcCodePrettify',
);

if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF')) {
    require_once(dirname(__FILE__) . '/SSI.php');
} elseif (!defined('SMF')) {
    die('<b>Error:</b> Cannot install - please verify that you put this file in the same place as SMF\'s index.php and SSI.php files.');
}

if ((SMF == 'SSI') && !$user_info['is_admin']) {
    die('Admin privileges required.');
}

if (!empty($context['uninstalling'])) {
    $call = 'remove_integration_function';
} else {
    $call = 'add_integration_function';
}

foreach ($hooks as $hook => $function) {
    $call($hook, $function);
}

if (SMF == 'SSI') {
    echo 'Database changes are complete! <a href="/">Return to the main page</a>.';
}
?>