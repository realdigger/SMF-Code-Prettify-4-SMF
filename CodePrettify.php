<?php
/**
 * @package SMF Code Prettify 4 SMF
 * @author digger
 * @copyright 2011-2016 http://mysmf.ru
 * @license Apache License 2.0
 * @version 1.0
 */

if (!defined('SMF')) {
    die('Hacking attempt...');
}

function loadCodePrettify()
{
    global $context, $settings, $options, $txt;

    $context['html_headers'] .= '
        <link rel="stylesheet" type="text/css" href="' . $settings['default_theme_url'] . '/css/prettify.css" />';

    $context['insert_after_template'] .= '
        <script type="text/javascript" src="' . $settings['default_theme_url'] . '/scripts/google-code-prettify/prettify.js"></script>
        <script type="text/javascript"><!-- // --><![CDATA[
            prettyPrint();
      	// ]]></script>';

}

function bbcCodePrettify(&$codes)
{
    global $context, $txt;

    $codes[9]['content'] = '<div class="codeheader">' . $txt['code'] . ': <a href="javascript:void(0);" onclick="return smfSelectText(this);" class="codeoperation">' . $txt['code_select'] . '</a></div>' . ($context['browser']['is_gecko'] || $context['browser']['is_opera'] ? '<pre style="margin: 0; padding: 0;">' : '') . '<code class="prettyprint linenums">$1</code>' . ($context['browser']['is_gecko'] || $context['browser']['is_opera'] ? '</pre>' : '');
    $codes[10]['content'] = '<div class="codeheader">' . $txt['code'] . ': ($2) <a href="#" onclick="return smfSelectText(this);" class="codeoperation">' . $txt['code_select'] . '</a></div>' . ($context['browser']['is_gecko'] || $context['browser']['is_opera'] ? '<pre style="margin: 0; padding: 0;">' : '') . '<code class="prettyprint linenums">$1</code>' . ($context['browser']['is_gecko'] || $context['browser']['is_opera'] ? '</pre>' : '');
    $codes[35]['content'] = '<div class="codeheader">' . $txt['code'] . ': (php) <a href="#" onclick="return smfSelectText(this);" class="codeoperation">' . $txt['code_select'] . '</a></div>' . ($context['browser']['is_gecko'] || $context['browser']['is_opera'] ? '<pre style="margin: 0; padding: 0;">' : '') . '<code class="prettyprint linenums">$1</code>' . ($context['browser']['is_gecko'] || $context['browser']['is_opera'] ? '</pre>' : '');

}

?>