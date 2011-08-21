<?php
/**
 * The main lessonplan configuration form
 *
 * It uses the standard core Moodle formslib. For more info about them, please
 * visit: http://docs.moodle.org/en/Development:lib/formslib.php
 *
 * @package   mod_lessonplan
 * @copyright 2011 Luis-Ramon Lopez Lopez
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html GNU Affero GPL 3
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/course/moodleform_mod.php');

class mod_lessonplan_mod_form extends moodleform_mod {

    function definition() {

        global $COURSE;
        $mform =& $this->_form;

//-------------------------------------------------------------------------------
    /// Adding the "general" fieldset, where all the common settings are showed
        $mform->addElement('header', 'general', get_string('general', 'form'));

    /// Adding the standard "name" field
        $mform->addElement('text', 'name', get_string('name')/*get_string('lessonplanname', 'lessonplan')*/, array('size'=>'64'));
        if (!empty($CFG->formatstringstriptags)) {
            $mform->setType('name', PARAM_TEXT);
        } else {
            $mform->setType('name', PARAM_CLEAN);
        }
        $mform->addRule('name', null, 'required', null, 'client');
        $mform->addRule('name', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');
        $mform->addHelpButton('name', 'lessonplanname', 'lessonplan');
      
        /// Adding the standard "intro" and "introformat" fields
        $this->add_intro_editor();
/*
//-------------------------------------------------------------------------------
    /// Adding the rest of lessonplan settings, spreeading all them into this fieldset
    /// or adding more fieldsets ('header' elements) if needed for better logic
        $mform->addElement('static', 'label1', 'lessonplansetting1', 'Your lessonplan fields go here. Replace me!');

        $mform->addElement('header', 'lessonplanfieldset', get_string('lessonplanfieldset', 'lessonplan'));
        $mform->addElement('static', 'label2', 'lessonplansetting2', 'Your lessonplan fields go here. Replace me!');*/

    /// Adding the "shared" checkbox
        $mform->addElement('advcheckbox', 'shared', null, get_string('shared', 'lessonplan'), array( 'group' => 1 ));
        //$mform->addRule('shared', null, 'required', null, 'client');

//-------------------------------------------------------------------------------
        // add standard elements, common to all modules
        $this->standard_coursemodule_elements();
//-------------------------------------------------------------------------------
        // add standard buttons, common to all modules
        $this->add_action_buttons();

    }
}
