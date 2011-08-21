<?php
/**
 * Lessonplan's tabs
 *
 * @package   mod_lessonplan
 * @copyright 2011 Luis-Ramon Lopez Lopez
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero GPL 3
 */

if (empty($currenttab) or /*empty($data) or*/empty($cm) or empty($course)) {
        print_error('cannotcallscript');
}

$context = get_context_instance(CONTEXT_MODULE, $cm->id);

$inactive = NULL;
$activetwo = NULL;
$tabs = array();
$row = array();

$row[] = new tabobject('units', $CFG->wwwroot.'/mod/lessonplan/view.php?d=0'/*$.data->id*/, get_string('units','lessonplan'));
$row[] = new tabobject('tasks', $CFG->wwwroot.'/mod/lessonplan/view.php?d=1'/*.$data->id*/, get_string('tasks','lessonplan'));

$tabs[] = $row;
print_tabs($tabs, $currenttab, $inactive, $activetwo);

