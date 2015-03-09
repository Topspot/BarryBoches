<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'barryboches');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
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
define('AUTH_KEY',         'Cg4DiXVq|dy5/8xRiUwJhD?0I s7h5 +GN9;o-7oxNiFPO~+&L/#5A6V>C7kQd5!');
define('SECURE_AUTH_KEY',  '.X3dAN|XL*=nuq*2lOmra3Rio+3HB[$znqI6~U`C--&ibfu$;TJ*)F`(g`Vyc@9=');
define('LOGGED_IN_KEY',    '?>OvBeZ2h4ln5Sqy:|)akIqtfm=<k^guL>y,lPF02 mPMG*BtxLbE<O&9Bz+_f$Y');
define('NONCE_KEY',        'mT6|.-#7Ez-Vu7EXb3zLe2{(l++V}g<kUnW@Yq&,H-;aXB<)[}|LFm_)|^yH Vb<');
define('AUTH_SALT',        '&H97,-ZQ.<)kQoe|[^[J>D9DvKa+J0V5<-}KOzORY$>)q- i#m|`w+Kg04Cr:mC%');
define('SECURE_AUTH_SALT', 'KcI+.@;s.y#|Rl%xV(mA_Qu/2Qj<)j`JjJHR4+;?d1zd`rC xu( ++C.jiC+*H4|');
define('LOGGED_IN_SALT',   ' N-Eia!tcOX%HXkX|.a:@f7u<+%R::1_+Ck@Z)V1EN0O,+%74e h<.2`>R.2/<&k');
define('NONCE_SALT',       'B6OxeM#c&4q<3s7[4 ![cgdk#+,J{|?q|#-.llMELm_c*@u<`H]Kt_JY5-smOO|B');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'spk_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
