<?php
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
define( 'DB_NAME', 'obvietnam' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         ')#Ao9pA.w3r}#7Pr#HvMyhsxV 4IRgTrU@U=dUYih==d1UPh*}klD-36i@TzQqdk' );
define( 'SECURE_AUTH_KEY',  'gW>h<V%6V%ks}E_UA{9=QZO>[0v!{q=[v#_[Uyg?.gAKNm>/6QUpORRwu#jpaV%!' );
define( 'LOGGED_IN_KEY',    'Mud>6d).%L@(Dxg]@PM|bO+[VA[K=Pl5E}[,W@3erN<8j|FAft5<Rb>..$De;D1I' );
define( 'NONCE_KEY',        'u}ez(I7!;};#r.w@^NH@CN63=tp,djeMbPqBu9VDo#-w+`rY,[9rU5;/*3osUpcu' );
define( 'AUTH_SALT',        'fz$CB?x*Q3FNjV$V;,U*f6pyj:A.@G*!;y}$*0aA2$P^<}sh~x03ZStJr y=zdJZ' );
define( 'SECURE_AUTH_SALT', ';)Xzw UY<us)4$Za{u+Z} GoIOxv^dM.zz!.)+Zxiq9>B_=mLOLCs&o21TH&!daC' );
define( 'LOGGED_IN_SALT',   '2`C`.q~f%X_3l2/&dFoL66~*FUehNf1Qxg]OqXZA]# FjU8^8m+( ?-njEp1-%XQ' );
define( 'NONCE_SALT',       ' jF6#*H>#ux9;xBKud2CciqP,{5MMkLJr_MQ!jP$~c2&-mF!]shLbXo4G`e/4aGG' );

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
