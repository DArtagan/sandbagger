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
define('AUTH_KEY',         'q6$Hvd|EyyP`[.YoD)CtCro=7}{?PPm${F9d*`y=2^Vy7;Xa2c|m-Pq0W+%|!&IO');
define('SECURE_AUTH_KEY',  'z?X-]M~cC*VGE*W#$Z-}1{<XYE:e*GM<kmcB>3m ~Wj(QZZ,%sn}|p?.}Q|3sy=<');
define('LOGGED_IN_KEY',    'Bh{MHS:bjptMI#1Z&js|n5V`RFV,KmI{6oGRA~[b?lILaB|C!*D/G 4csu*BT%.d');
define('NONCE_KEY',        '.N?L^zas)/;a:Pyzff-BK f|c8TJR>n|rH#|_Kk&ex{Wx0hC5&~BiY+<-V}(nZ{[');
define('AUTH_SALT',        'TjN<)ZQD4>}o Mc;0LO,+s}[VAn6B.W&2v$moTfn~G|a|V^@~2z,RiT#;/uDoo5v');
define('SECURE_AUTH_SALT', '*KbJ-HND:0h3-)$0Gx?1v^e#1RZ?bGp(U,@/uSY/SQDbS68|1g@j;}~UPGnU+<{D');
define('LOGGED_IN_SALT',   '%9?Xp#mS`.C%>1yIC#;% 9e*+@uNcU50EN|-|(He(&#71c76M):QY%86XlvePm!U');
define('NONCE_SALT',       ',lv[GtR1wVd$IyAe4w!)IWDJZ(qpzg(xlL3Jp7JtXuAdE O@a|_faw&..+^!6)`q');

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
