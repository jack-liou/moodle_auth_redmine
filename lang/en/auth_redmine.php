<?php

/**
 * Strings for component 'auth_redmine', language 'en'.
 *
 * @package   auth_redmine
 * @copyright 2019 Click-AP  {@link https://www.click-ap.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['auth_redminecantconnect'] = 'Could not connect to the specified authentication database...';
$string['auth_redminedebugauthdb'] = 'Debug ADOdb';
$string['auth_redminedebugauthdbhelp'] = 'Debug ADOdb connection to external database - use when getting empty page during login. Not suitable for production sites.';
$string['auth_redminedeleteuser'] = 'Deleted user {$a->name} id {$a->id}';
$string['auth_redminedeleteusererror'] = 'Error deleting user {$a}';
$string['auth_redminedescription'] = 'This method uses an external database table to check whether a given username and password is valid.  If the account is a new one, then information from other fields may also be copied across into Moodle.';
$string['auth_redmineextencoding'] = 'External redmine encoding';
$string['auth_redmineextencodinghelp'] = 'Encoding used in external database';
$string['auth_redmineextrafields'] = 'These fields are optional.  You can choose to pre-fill some Moodle user fields with information from the <b>external database fields</b> that you specify here. <p>If you leave these blank, then defaults will be used.</p><p>In either case, the user will be able to edit all of these fields after they log in.</p>';
$string['auth_redminefieldpass'] = 'Name of the field containing passwords';
$string['auth_redminefieldpass_key'] = 'Password field';
$string['auth_redminefielduser'] = 'Name of the field containing usernames';
$string['auth_redminefielduser_key'] = 'Username field';
$string['auth_redminehost'] = 'The computer hosting the database server. Use a system DSN entry if using ODBC. Use a PDO DSN entry if using PDO.';
$string['auth_redminehost_key'] = 'Host';
$string['auth_redminechangepasswordurl_key'] = 'Password-change URL';
$string['auth_redmineinsertuser'] = 'Inserted user {$a->name} id {$a->id}';
$string['auth_redmineinsertuserduplicate'] = 'Error inserting user {$a->username} - user with this username was already created through \'{$a->auth}\' plugin.';
$string['auth_redmineinsertusererror'] = 'Error inserting user {$a}';
$string['auth_redminename'] = 'Name of the database itself. Leave empty if using an ODBC DSN. Leave empty if your PDO DSN already contains the database name.';
$string['auth_redminename_key'] = 'DB name';
$string['auth_redminepass'] = 'Password matching the above username';
$string['auth_redminepass_key'] = 'Password';
$string['auth_redminepasstype'] = '<p>Specify the format that the password field is using.</p> <p>Use \'internal\' if you want the external database to manage usernames and email addresses, but Moodle to manage passwords. If you use \'internal\', you <i>must</i> provide a populated email address field in the external database, and you must execute both admin/cron.php and auth/redmine/cli/sync_users.php regularly. Moodle will send an email to new users with a temporary password.</p>';
$string['auth_redminepasstype_key'] = 'Password format';
$string['auth_redminereviveduser'] = 'Revived user {$a->name} id {$a->id}';
$string['auth_redminerevivedusererror'] = 'Error reviving user {$a}';
$string['auth_redminesaltedcrypt'] = 'Crypt one-way string hashing';
$string['auth_redminesetupsql'] = 'SQL setup command';
$string['auth_redminesetupsqlhelp'] = 'SQL command for special database setup, often used to setup communication encoding - example for MySQL and PostgreSQL: <em>SET NAMES \'utf8\'</em>';
$string['auth_redminesuspenduser'] = 'Suspended user {$a->name} id {$a->id}';
$string['auth_redminesuspendusererror'] = 'Error suspending user {$a}';
$string['auth_redminesybasequoting'] = 'Use sybase quotes';
$string['auth_redminesybasequotinghelp'] = 'Sybase style single quote escaping - needed for Oracle, MS SQL and some other databases. Do not use for MySQL!';
$string['auth_redminesyncuserstask'] = 'Synchronise users task';
$string['auth_redminetable'] = 'Name of the table in the database';
$string['auth_redminetable_key'] = 'Table';
$string['auth_redminetype'] = 'The database type (see the documentation <a href="http://adodb.org/dokuwiki/doku.php" target="_blank">ADOdb - Database Abstraction Layer for PHP</a> for details).';
$string['auth_redminetype_key'] = 'Database';
$string['auth_redmineupdateusers'] = 'Update users';
$string['auth_redmineupdateusers_description'] = 'As well as inserting new users, update existing users.';
$string['auth_redmineupdatinguser'] = 'Updating user {$a->name} id {$a->id}';
$string['auth_redmineuser'] = 'Username with read access to the database';
$string['auth_redmineuser_key'] = 'DB user';
$string['auth_redmineuserstoadd'] = 'User entries to add: {$a}';
$string['auth_redmineuserstoremove'] = 'User entries to remove: {$a}';
$string['auth_redminenoexttable'] = 'External table not specified.';
$string['auth_redminenouserfield'] = 'External user field not specified.';
$string['auth_redminecannotconnect'] = 'Cannot connect to external database.';
$string['auth_redminecannotreadtable'] = 'Cannot read external table.';
$string['auth_redminetableempty'] = 'External table is empty.';
$string['auth_redminecolumnlist'] = 'External table contains the following columns:<br />{$a}';
$string['pluginname'] = 'Redmine';
$string['privacy:metadata'] = 'The External database authentication plugin does not store any personal data.';
