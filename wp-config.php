<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wordpressuser' );

/** Database password */
define( 'DB_PASSWORD', 'password' );

define( 'FS_METHOD', 'direct' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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

define('AUTH_KEY',         'vIJF{.RGiCfsFDeI0t+}6R+@e%N6JM2@LF4SGs;|QgP t2ryt>~ ~}wN*c|t?/az');
define('SECURE_AUTH_KEY',  ',)EX5Ix)<f8P(gT)TJ1d)h/]FT`#+2|?%^68M83(C-a |$7[GS/%+4IH+`@-{V;O');
define('LOGGED_IN_KEY',    '*A&{m~<7z&p0Zv)416@(3ea.R%:}73#lnc/;i~k~N2)1Cgcx?|+VFU%(-F-7tO0a');
define('NONCE_KEY',        'qa7|7]B_t0hZ-_,L{ZTZ0`T33%H51z@gDmQN13i`XFYe%~@gxIKCyQe<)yeO]+j$');
define('AUTH_SALT',        'izsTK3<(SMoLU,)O,>#;xf)GK7t+-&HDibK`)vuX1@bA2KJagc/XAYDSKqkEZV,<');
define('SECURE_AUTH_SALT', 'Ms]idUrh`-t]/c{qhM2-.?:+`[jm+,8{6eW3XN]W.~V[]F$fN(Y]HLQ*]12YmT y');
define('LOGGED_IN_SALT',   'w:x>h$]sWcOz oMfH~+a$zJ;P6sEzM]/0`Hn+y >/Dwv#Ft%7#~wds+?OP+&*>? ');
define('NONCE_SALT',       'D5&];~|0{,0gvLw<cAFg}N2GIJv)+.5!<!U00]fHq>OR.u_YQQvUB?|/{[g-,r|M');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}
define( 'UPLOADS', 'wp-content/uploads' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
