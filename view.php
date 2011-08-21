<?php
/**
 * Prints a particular instance of lessonplan
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package   mod_lessonplan
 * @copyright 2011 Luis-Ramon Lopez Lopez
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero GPL 3
 */

require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once(dirname(__FILE__).'/lib.php');

$id = optional_param('id', 0, PARAM_INT); // course_module ID, or
$n  = optional_param('l', 0, PARAM_INT);  // lessonplan instance ID - it should be named as the first character of the module

if ($id) {
    $cm         = get_coursemodule_from_id('lessonplan', $id, 0, false, MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
    $lessonplan  = $DB->get_record('lessonplan', array('id' => $cm->instance), '*', MUST_EXIST);
} elseif ($n) {
    $lessonplan  = $DB->get_record('lessonplan', array('id' => $n), '*', MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $lessonplan->course), '*', MUST_EXIST);
    $cm         = get_coursemodule_from_instance('lessonplan', $lessonplan->id, $course->id, false, MUST_EXIST);
} else {
    error('You must specify a course_module ID or an instance ID');
}

require_login($course, true, $cm);

$context = get_context_instance(CONTEXT_MODULE, $cm->id);
require_capability('mod/lessonplan:view', $context);

add_to_log($course->id, 'lessonplan', 'view', "view.php?id=$cm->id", $lessonplan->name, $cm->id);

/// Print the page header

$PAGE->set_url('/mod/lessonplan/view.php', array('id' => $cm->id));
$PAGE->set_title($lessonplan->name);
$PAGE->set_heading($course->shortname);
$PAGE->set_button(update_module_button($cm->id, $course->id, get_string('modulename', 'lessonplan')));

// other things you may want to set - remove if not needed
//$PAGE->set_cacheable(false);
//$PAGE->set_focuscontrol('some-html-id');

// Output starts here
echo $OUTPUT->header();

$currenttab = 'units';

include('tabs.php');

// Replace the following lines with you own code
echo $OUTPUT->heading('Yay! It works!');

// Finish the page
echo $OUTPUT->footer();
