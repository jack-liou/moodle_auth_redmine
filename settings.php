<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Admin settings and defaults.
 *
 * @package auth_redmine
 * @author    Jack Liou<jack@click-ap.com>
 * @copyright Copyright (c) 2019 Click-AP {@link https://www.click-ap.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    // We use a couple of custom admin settings since we need to massage the data before it is inserted into the DB.
    require_once($CFG->dirroot.'/auth/redmine/classes/admin_setting_special_auth_configtext.php');

    // Needed for constants.
    require_once($CFG->libdir.'/authlib.php');

    // Introductory explanation.
    $settings->add(new admin_setting_heading('auth_redmine/pluginname', '', new lang_string('auth_redminedescription', 'auth_redmine')));

    // Host.
    $settings->add(new admin_setting_configtext('auth_redmine/host', get_string('auth_redminehost_key', 'auth_redmine'),
            get_string('auth_redminehost', 'auth_redmine') . ' ' .get_string('auth_multiplehosts', 'auth'),
            '127.0.0.1', PARAM_RAW));

    // Type.
    $dboptions = array();
    $dbtypes = array("access", "ado_access", "ado", "ado_mssql", "borland_ibase", "csv", "db2",
        "fbsql", "firebird", "ibase", "informix72", "informix", "mssql", "mssql_n", "mssqlnative",
        "mysql", "mysqli", "mysqlt", "oci805", "oci8", "oci8po", "odbc", "odbc_mssql", "odbc_oracle",
        "oracle", "pdo", "postgres64", "postgres7", "postgres", "proxy", "sqlanywhere", "sybase", "vfp");
    foreach ($dbtypes as $dbtype) {
        $dboptions[$dbtype] = $dbtype;
    }

    $settings->add(new admin_setting_configselect('auth_redmine/type',
        new lang_string('auth_redminetype_key', 'auth_redmine'),
        new lang_string('auth_redminetype', 'auth_redmine'), 'mysqli', $dboptions));

    // Sybase quotes.
    $yesno = array(
        new lang_string('no'),
        new lang_string('yes'),
    );

    $settings->add(new admin_setting_configselect('auth_redmine/sybasequoting',
        new lang_string('auth_redminesybasequoting', 'auth_redmine'), new lang_string('auth_redminesybasequotinghelp', 'auth_redmine'), 0, $yesno));

    // DB Name.
    $settings->add(new admin_setting_configtext('auth_redmine/name', get_string('auth_redminename_key', 'auth_redmine'),
            get_string('auth_redminename', 'auth_redmine'), '', PARAM_RAW_TRIMMED));

    // DB Username.
    $settings->add(new admin_setting_configtext('auth_redmine/user', get_string('auth_redmineuser_key', 'auth_redmine'),
            get_string('auth_redmineuser', 'auth_redmine'), '', PARAM_RAW_TRIMMED));

    // Password.
    $settings->add(new admin_setting_configpasswordunmask('auth_redmine/pass', get_string('auth_redminepass_key', 'auth_redmine'),
            get_string('auth_redminepass', 'auth_redmine'), ''));

    // DB Table.
    $settings->add(new admin_setting_configtext('auth_redmine/table', get_string('auth_redminetable_key', 'auth_redmine'),
            get_string('auth_redminetable', 'auth_redmine'), '', PARAM_RAW_TRIMMED));

    // DB User field.
    $settings->add(new admin_setting_configtext('auth_redmine/fielduser', get_string('auth_redminefielduser_key', 'auth_redmine'),
            get_string('auth_redminefielduser', 'auth_redmine'), '', PARAM_RAW_TRIMMED));

    // DB User password.
    $settings->add(new admin_setting_configtext('auth_redmine/fieldpass', get_string('auth_redminefieldpass_key', 'auth_redmine'),
            get_string('auth_redminefieldpass', 'auth_redmine'), '', PARAM_RAW_TRIMMED));


    // DB Password Type.
    $passtype = array();
    $passtype["plaintext"]   = get_string("plaintext", "auth");
    $passtype["md5"]         = get_string("md5", "auth");
    $passtype["sha1"]        = get_string("sha1", "auth");
    $passtype["saltedcrypt"] = get_string("auth_redminesaltedcrypt", "auth_redmine");
    $passtype["internal"]    = get_string("internal", "auth");

    $settings->add(new admin_setting_configselect('auth_redmine/passtype',
        new lang_string('auth_redminepasstype_key', 'auth_redmine'), new lang_string('auth_redminepasstype', 'auth_redmine'), 'plaintext', $passtype));

    // Encoding.
    $settings->add(new admin_setting_configtext('auth_redmine/extencoding', get_string('auth_redmineextencoding', 'auth_redmine'),
            get_string('auth_redmineextencodinghelp', 'auth_redmine'), 'utf-8', PARAM_RAW_TRIMMED));

    // DB SQL SETUP.
    $settings->add(new admin_setting_configtext('auth_redmine/setupsql', get_string('auth_redminesetupsql', 'auth_redmine'),
            get_string('auth_redminesetupsqlhelp', 'auth_redmine'), '', PARAM_RAW_TRIMMED));

    // Debug ADOOB.
    $settings->add(new admin_setting_configselect('auth_redmine/debugauthdb',
        new lang_string('auth_redminedebugauthdb', 'auth_redmine'), new lang_string('auth_redminedebugauthdbhelp', 'auth_redmine'), 0, $yesno));

    // Password change URL.
    $settings->add(new auth_redmine_admin_setting_special_auth_configtext('auth_redmine/changepasswordurl',
            get_string('auth_redminechangepasswordurl_key', 'auth_redmine'),
            get_string('changepasswordhelp', 'auth'), '', PARAM_URL));

    // Label and Sync Options.
    $settings->add(new admin_setting_heading('auth_redmine/usersync', new lang_string('auth_sync_script', 'auth'), ''));

    // Sync Options.
    $deleteopt = array();
    $deleteopt[AUTH_REMOVEUSER_KEEP] = get_string('auth_remove_keep', 'auth');
    $deleteopt[AUTH_REMOVEUSER_SUSPEND] = get_string('auth_remove_suspend', 'auth');
    $deleteopt[AUTH_REMOVEUSER_FULLDELETE] = get_string('auth_remove_delete', 'auth');

    $settings->add(new admin_setting_configselect('auth_redmine/removeuser',
        new lang_string('auth_remove_user_key', 'auth'),
        new lang_string('auth_remove_user', 'auth'), AUTH_REMOVEUSER_KEEP, $deleteopt));

    // Update users.
    $settings->add(new admin_setting_configselect('auth_redmine/updateusers',
        new lang_string('auth_redmineupdateusers', 'auth_redmine'),
        new lang_string('auth_redmineupdateusers_description', 'auth_redmine'), 0, $yesno));

    // Display locking / mapping of profile fields.
    $authplugin = get_auth_plugin('redmine');
    display_auth_lock_options($settings, $authplugin->authtype, $authplugin->userfields,
            get_string('auth_redmineextrafields', 'auth_redmine'),
            true, true, $authplugin->get_custom_user_profile_fields());

}
