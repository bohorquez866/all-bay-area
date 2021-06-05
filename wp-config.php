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
define( 'DB_NAME', 'all-bay-area' );
/** MySQL database username */
define( 'DB_USER', 'root' );
/** MySQL database password */
define( 'DB_PASSWORD', 'root' );
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
define( 'AUTH_KEY',         ']oTg/zm%|:gB(>GTI)y# 5U3u$1!%^)L ,^)wT*B%Nt1xT.d,.U~<UHdB,Tv!BRx' );
define( 'SECURE_AUTH_KEY',  'T5I+K7<*AFz1P%<&l96+^j?|S2=CU=uWOlmYrK8L81{Q?ff.aJc_`?a|-h})b}uo' );
define( 'LOGGED_IN_KEY',    '(CjQ)u@RA,WUq`@W$#=v`@|;[D`jt%l.%].884zpZ=6RM&z^=0+:?cp8!b6>25<X' );
define( 'NONCE_KEY',        '2`GQ4Qr[up}e5+C&76@([n<Mt={ pL )]!(qJdugm)]7G7)C{1#z.BA<spCTp3<f' );
define( 'AUTH_SALT',        '0iWX(<~1;F9H/dKK+bDPann8nlNNtZnq8(dv}Tz77(Hfn<hIZQwoK#foSKt*6QH3' );
define( 'SECURE_AUTH_SALT', 'Q+pA*3 FcEhJ7QNEA(e?a wO vMC7kekZUv!-)HxIwFa)D$_J30F]mjUxUAIb)9l' );
define( 'LOGGED_IN_SALT',   'd4@%H_vq5[~J&Fw:k2 WYpT55Ug#^R9NGs5Sx!SqDD(,-k^uasQRhX^24+i/R10l' );
define( 'NONCE_SALT',       'O5eDFW E.iS{YJdHTzz!i6}y}^CIOg)*A_aEa,TIU562xnHA@kkd3Jl9_1T%$CS)' );
/**#@-*/
/**
* WordPress Database Table prefix.
*
* You can have multiple installations in one database if you give each
* a unique prefix. Only numbers, letters, and underscores please!
*/
$table_prefix = 'all_by_area_wp_';
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