<?php
// Begin AIOWPSEC Firewall
if (file_exists('/var/www/html/sabir/zinvos/aios-bootstrap.php')) {
	include_once('/var/www/html/sabir/zinvos/aios-bootstrap.php');
}
// End AIOWPSEC Firewall
define( 'WP_CACHE', true );

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', "zinvos" );

/** Database username */
define( 'DB_USER', "sabir" );

/** Database password */
define( 'DB_PASSWORD', "4sabir" );

/** Database hostname */
define( 'DB_HOST', "localhost" );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'v0JaaS,y^3~(v+0-BKs6Jhdn7N*w{3[r7ifjqh4o{DGvH/ooyP}vH~~y{Rv9_MwD');
define('SECURE_AUTH_KEY',  'UYn]%k.-rx>z&0<.lTo)AH*(vr886*tV-XCfaO^odW&Z]b=!4jy@%]BR-y;@;Iaf');
define('LOGGED_IN_KEY',    '`?`5*=noH7YSV.%A<L&bNe} |0LF+Q@3+nyrm+^P+l?(-j/$r%UItfOx],M]fAB?');
define('NONCE_KEY',        'h<@[:d.RVY]%!dLs~c*HuKOLV6T~|-RY LpbtNC2kF [rwW=P%>l6+=2} +TkM1h');
define('AUTH_SALT',        '@3J`xQ^@pXW9l_mg_=TXq!dRUz%`B2+.,HmwuwSU/5{N+fvdrX9`p4gy[4l5TY-E');
define('SECURE_AUTH_SALT', 'Ji-%+6gZU.H4Ast1+ZgVMlMn+q|JfIU;uzXV,W}ytvEg[{V>_^<^3|c2h%Y]t!#8');
define('LOGGED_IN_SALT',   '^-j0$e<~>u?MqN/|CK%4aH&0ep3v%ki?BT/wJ}=3xV}z&R->Bc}|Qzj e)DS~^Ab');
define('NONCE_SALT',       'r39pRsP|uzn?,148|kWh(*?m`-{,6ntssw.{w;3e/ME]{4j^/sTuMi#>wRa@4%+C');
/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';