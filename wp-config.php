<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'WordpressBD');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '@J+X!/SlTlSRuR_&Tz5;M:.G-+p,2VZSV+F3P5%|k8 `$X/QwiQhAiUR;nae6Jz8');
define('SECURE_AUTH_KEY',  '{#7;tQ7U zl 6>O&@Ims;4bTKX4F$9S7^` a;M-*nHV-1|NMR`T5K-Jo+b4gE,n[');
define('LOGGED_IN_KEY',    '3-zKMz&9n|A?+p%d|y&ESv{UNY3!;pTyZ;*O;-F *kKlXN)Mb8,L)N]Rf1CeIC}L');
define('NONCE_KEY',        '3Q]y-RD3OTgWw([95r}kR,sZIaZp94}pq1m[|(TO[=S8T(TGdz )_,2k)#^U4Kvx');
define('AUTH_SALT',        'dsa yPJ$~w^#jO!l-9Et^11RCOko/g[!G;!,(ATr_b)o7* 7o3O9NnE}3XRL-/X+');
define('SECURE_AUTH_SALT', 's[*h-t5V[C9{;-j)b{vACjQ-^/nB`Kj3%l +M@ziSeK?Q1J@GOI)-;5eKqX6d+<!');
define('LOGGED_IN_SALT',   'aA+#I:wZ0Ape/koA+2Ka>]r4T*_>jnYgDf>-Y8ZC^Jdn+HrqD^A<WWks~PkNm[=p');
define('NONCE_SALT',       'ixFttV%)s:i|&1n`p$dh78m{AOI}XOpM2O-k4`*hSc0z(UXLM0bIT&vEhL4jt?08');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_1';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
