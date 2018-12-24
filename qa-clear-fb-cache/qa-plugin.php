<?php
/*
	Plugin Name: Clear FB cache
	Plugin URI: https://github.com/stefanmm/qa-clear-fb-share-cache/
	Plugin Description: Simple plugin that will clear FB share cache after new question is published so you don't have to
	Plugin Version: 0.1
	Plugin Date: 2018-12-24
	Plugin Author: Stefan Marjanov
	Plugin Author URI: https://www.saznajnovo.com/
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.7
	Plugin Update Check URI:
*/
if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
    header('Location: ../../');
    exit;
}
qa_register_plugin_module('module', 'qa-clear-fb-cache-admin.php', 'qa_clear_fb_cache_admin', 'Clear FB Cache');
qa_register_plugin_module('event', 'clear-fb-cache.php', 'qa_event_clear_cache', 'Clear Cache FB');
