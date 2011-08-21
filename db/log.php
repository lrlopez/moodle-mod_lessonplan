<?php
/**
 * Definition of log events
 * NOTE: this is an example how to insert log event during installation/update.
 * It is not really essential to know about it, but these logs were created as example
 * in the previous 1.9 NEWMODULE.
 *
 * @package   mod_lessonplan
 * @copyright 2011 Luis-Ramon Lopez Lopez
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero GPL 3
 */

defined('MOODLE_INTERNAL') || die();

global $DB;

$logs = array(
    array('module'=>'lessonplan', 'action'=>'add', 'mtable'=>'lessonplan', 'field'=>'name'),
    array('module'=>'lessonplan', 'action'=>'update', 'mtable'=>'lessonplan', 'field'=>'name'),
    array('module'=>'lessonplan', 'action'=>'view', 'mtable'=>'lessonplan', 'field'=>'name'),
    array('module'=>'lessonplan', 'action'=>'view all', 'mtable'=>'lessonplan', 'field'=>'name')
);
