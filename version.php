<?php
/**
 * Defines the version of lessonplan
 *
 * This code fragment is called by moodle_needs_upgrading() and
 * /admin/index.php
 *
 * @package   mod_lessonplan
 * @copyright 2011 Luis-Ramon Lopez Lopez
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero GPL 3
 */

defined('MOODLE_INTERNAL') || die();

$module->version  = 2011082100;           // If version == 0 then module will not be installed
//$module->version  = 2010032200;  // The current module version (Date: YYYYMMDDXX)
$module->requires = 2010031900;  // Requires this Moodle version
$module->cron     = 0;           // Period for cron to check this module (secs)
