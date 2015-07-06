<?php

namespace libKML;

/**
 *
 *
 * File containing general imports and definitions
 *
 * @package libkml
 */

/**
 * Version of the library
 */
define('LIBKML_VERSION', '0.2');


/**
 * KML default schema version
 */
define('KML_DEFAULT_SCHEMA_VERSION', '2.2');

/**
 * KML default encoding
 */
define('KML_DEFAULT_ENCODING', 'UTF-8');

/**
 * @var 	If exists geoPHP library
 */
if (class_exists('geoPHP')) {
    define ('WITH_GEOPHP', 1);
} else {
    define ('WITH_GEOPHP', 0);
}

/*
 *  Extended geoJSON features types
 */
define('EXTGEOJSON_FEATURE_PLACEMARK', 1);
define('EXTGEOJSON_FEATURE_OVERLAY', 2);




