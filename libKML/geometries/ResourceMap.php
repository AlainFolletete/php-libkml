<?php
namespace libKML\geometries;
use libKML\KMLObject;

/**
 *  ResouceMap class
 */

class ResourceMap extends KMLObject {
    private $aliases;

    public function getAliases() {
        return $this->aliases;
    }

    public function setAliases($aliases) {
        $this->aliases = $aliases;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return '';
    }
}

