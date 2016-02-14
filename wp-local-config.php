<?php
/**
 * This is a sample wp-local-config.php
 */

// ** MySQL settings - You can get this info from your web host ** //
 //put a sitename . This will be the prefix of table
define('DB_NAME', 'database_name_here');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');




/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = SITENAME . '_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);


//Remove contact form 7 css and js, location must be before abspath
//define ('WPCF7_LOAD_JS', false); // Added to disable JS loading
//define ('WPCF7_LOAD_CSS', false); // Added to disable CSS loading



/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


/*Custom definitions*/

//Change the Number of Default Post Revisions
//define( 'WP_POST_REVISIONS', 2 );

//Empty Your WordPress Trash
//define( 'EMPTY_TRASH_DAYS', 10 ); // 10 days

//Automatic Database Optimizing
//define( 'WP_ALLOW_REPAIR', true );

//change the directory file of wp-content to improve security
//* Notice the wp-content folder does not have a trailing slash
//define( 'WP_CONTENT_DIR', dirname(__FILE__) . '/newlocation/wp-content' );

//increase memory limit
//define('WP_MEMORY_LIMIT', '96M');
