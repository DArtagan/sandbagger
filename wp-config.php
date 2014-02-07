<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */
 
// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'q-fill');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'q-fill');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', 'password');
}
if (!defined('DB_HOST')) {
	define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Z9zMkCAO<+faYH<3i12ZQp!qY4{w?_ddx/]/Y)_GBZx7)+w +X(6K{8@QWUxu+X%');
define('SECURE_AUTH_KEY',  'u)M8$~56Nn7RA-x-kwm)&f9!SJhuiA%O6&;^3pf4y/o-*4rkK~C%xbmc+5}c:I:p');
define('LOGGED_IN_KEY',    '$zF^DZ}nZ9aj!:+cJ+Mx^(=#p.R6S+Cn%1~nSU,HF)%@59!`{SbX>ph`k{Ql`90K');
define('NONCE_KEY',        '1CF-Y7Iz3.6KV L FwxlG0xq]hzc}Mk)Cy]?S}J~?}qy>qL^WP@+vk;[EyS!bp48');
define('AUTH_SALT',        '^:B-_yf`CL}*|>C4rc2:+k_U1@FA2/TuK*koGZw6nDrF^X|dI5r-kzdey}%VVFjk');
define('SECURE_AUTH_SALT', 'W*Lj`FPADa#31cri-!DIH|{.7qIaE8@8ZWMU^~8~Ss*uOj2G~=o>vJi/9}(MP#4B');
define('LOGGED_IN_SALT',   'a1p:+kp#)[Y[@sG{NoN}-QKgb@g$xH)QS.w8%1El49+Jf<tv?+Y|L,x*oi?wQ!ya');
define('NONCE_SALT',       'chE.V|E=zXTsrYSJ2pV_.*QI?*/QA>9jl4^56Fhm7llLta_n(i61~|I4c+;izC?#');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * Set custom paths
 *
 * These are required because wordpress is installed in a subdirectory.
 */
if (!defined('WP_SITEURL')) {
	define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/wordpress');
}
if (!defined('WP_HOME')) {
	define('WP_HOME',    'http://' . $_SERVER['SERVER_NAME'] . '');
}
if (!defined('WP_CONTENT_DIR')) {
	define('WP_CONTENT_DIR', dirname(__FILE__) . '/content');
}
if (!defined('WP_CONTENT_URL')) {
	define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/content');
}


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
