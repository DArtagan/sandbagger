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
	define('DB_NAME', 'yeopress');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'yeopress');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', 'yeopress');
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
define('AUTH_KEY',         'ql-MVI-ix&8Rfe^i,+@F8UC/I%[_.!hu1])uQ9sG:N(VEqZ-[Cs6Q!Z*?q=7C/bR');
define('SECURE_AUTH_KEY',  '+q`v2O|J/(d-F.n^kEzsIZQwpO{9n@4TDl/P<|&?-..16k&@7?wHf%!XIE>tr97T');
define('LOGGED_IN_KEY',    'W;VGJ>:<@uaZ{XLaL?&bp75^;lI1)wOe=RQ+g8Zv<)y~q~VUlM*c`* He`go7b|E');
define('NONCE_KEY',        '!#^ -DCz,#5DE;=YvUas{zc8]4`A%iFPI:!wz!w/K2xNlK `!)L9Ke6%j;.w>XQ,');
define('AUTH_SALT',        'w]$/!5KrP$BrTT/Q#tIxDat;0dX+^`Q&m-FW,jo%%=U^uL!&BP?YglO+N=G]jWI-');
define('SECURE_AUTH_SALT', 'eKz(KD;nPA~].0N2RD=2c1{y*&DTQ}gNvO#G!;B}|ww}Yj`?_{-+2lZK?XuvC{lA');
define('LOGGED_IN_SALT',   'LGp.-7,2XIx=57$AB2(foj@Lfc.IJ9O:?xpN`[i0z!gW41>Ha(WD_RSoVr[p``Q_');
define('NONCE_SALT',       '}lF*ZCn*Cw|Ct-P [<{P|WNAn#;A#[&l;2f(hel uyku!;R!E[[^OAO9[vFc&1F^');

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
	define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . ':8089/wordpress');
}
if (!defined('WP_HOME')) {
	define('WP_HOME',    'http://' . $_SERVER['SERVER_NAME'] . ':8089');
}
if (!defined('WP_CONTENT_DIR')) {
	define('WP_CONTENT_DIR', dirname(__FILE__) . '/content');
}
if (!defined('WP_CONTENT_URL')) {
	define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . ':8089/content');
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
