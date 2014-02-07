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
	define('DB_NAME', 'sandbagger');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'sandbagger');
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
define('AUTH_KEY',         '!U& 6JJL}*iV%=h<,z,iZ~vY{m0tO=%qRWh.)dRXZ}nj*?{KfnzW.5HIS}Q;r!:$');
define('SECURE_AUTH_KEY',  '5HIRn;-2J[u9RqMss.R+3w+G6?vWY<$jX7:+Mm#}3mt,,FdyDr(g<ce]GgQ9->7q');
define('LOGGED_IN_KEY',    ';3IZL<y8_gw-kC#SfUW19%$kIr=nM>Z(]a|b<7c,@=lf8|=6@+v6YJ{dY!-JKgKO');
define('NONCE_KEY',        'dXv<&;&j.8xj+EgHUnILg+A**b(jo-;@FTwg/SF=iG]YV*3-hNH:5e0|uPv5p SF');
define('AUTH_SALT',        'fI]gc+FrC,1n_(a!2Fljv~s}lQN&<Nr[pVN#NIEh@uc=~+XqBCD:DzQA.|j;+#L%');
define('SECURE_AUTH_SALT', 'k&* Iy!7C)}o&#dz*~Jn4BB+st~G%Y?]eG^<f-&AN24H-eS5zpIHx!)#;%E85x]X');
define('LOGGED_IN_SALT',   'ZoK]sMbR[?D^qC]%C4lL+0maB0@rOPycd<+JqM,}@+|=,zO:y#B+B3)$[>)31}g}');
define('NONCE_SALT',       '!c:F%qV;5; K-KLg2BEPV#lyZ:(]8KA)(-y2$Odr3T%8Q+rcwza(jxC3 Y>T}O%0');

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
