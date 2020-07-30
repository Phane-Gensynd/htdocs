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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'GENSYNDWEB' );

/** MySQL database username */
define( 'DB_USER', 'gensynd' );

/** MySQL database password */
define( 'DB_PASSWORD', '*842gensynd' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'r4~bG~4]pfJ:gp|+4?pN]y%PNosX4Ut:TB|g _X7bAMUDNi$s|~B[KxY!tKTyvtU' );
define( 'SECURE_AUTH_KEY',  '86c[xNLi @o:,ze}494bV:;uUXtmkWZ[<IKk=6Y%v 63cT86^SwgF56pW<PNcd:i' );
define( 'LOGGED_IN_KEY',    'B_:k1Kwh!{X,yl6J;-belf)fAxd-ZY(&h*Wmm}Qn_TJ.9@sZkD8Hz@%!nVa >txu' );
define( 'NONCE_KEY',        'n{7*x ec9 gjo<5pyC s=,YN3fwXPE# *s.YIX@-7D{oJ4xL*qo$Y@-8cBZo+W>R' );
define( 'AUTH_SALT',        'Jjc#Y-1AZ8clsP77!}GKOO:J>`kPz21vUQ<_p+-;nLd51nlnvuSk~BQSNT&(<`c9' );
define( 'SECURE_AUTH_SALT', 'd6N;#30idOes]enTTEU(R/N=8?Y|/cN)A}Ae<[k,!KZq8>#$l&o6{.+:yoLg3<hf' );
define( 'LOGGED_IN_SALT',   ':[B%@a8WA5TooO$AAbNQ|[l9[Xn/]N}WMLD4Lp0Md;yxl)h]m!;Kyfkmz#C>gLuE' );
define( 'NONCE_SALT',       'Je+fo3t`B1zHV3vw;C~F E8~`4?P,y9Tos9^y[^+fn+ZQTp:P8gqhfYxc]5MuzNr' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
