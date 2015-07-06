<?php
namespace libKML\geometries;
use libKML\KMLObject;

/**
 *  Geometry abstract class
 */
abstract class Geometry extends KMLObject {

    public abstract function toWKT();
    public abstract function toJSON();

}

