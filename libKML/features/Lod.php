<?php
namespace libKML\features;
use libKML\KMLObject;

/**
 *  Lod class
 */

class Lod extends KMLObject {

    private $minLodPixels;
    private $maxLodPixels;
    private $minFadeExtent;
    private $maxFadeExtent;

    public function getMinLodPixels() {
        return $this->minLodPixels;
    }

    public function setMinLodPixels($minLodPixels) {
        $this->minLodPixels = $minLodPixels;
    }

    public function getMaxLodPixels() {
        return $this->maxLodPixels;
    }

    public function setMaxLodPixels($maxLodPixels) {
        $this->maxLodPixels = $maxLodPixels;
    }

    public function getMinFadeExtent() {
        return $this->minFadeExtent;
    }

    public function setMinFadeExtent($minFadeExtent) {
        $this->minFadeExtent = $minFadeExtent;
    }

    public function getMaxFadeExtent() {
        return $this->maxFadeExtent;
    }

    public function setMaxFadeExtent($maxFadeExtent) {
        $this->maxFadeExtent = $maxFadeExtent;
    }
    public function __toString()
    {
        $result = array();
        $result[] = '<Lod>';
        if (isset($this->minLodPixels)) $result[] = "<minLodPixels>{$this->minLodPixels}</minLodPixels>";
        if (isset($this->maxLodPixels)) $result[] = "<maxLodPixels>{$this->maxLodPixels}</maxLodPixels>";
        if (isset($this->minFadeExtent)) $result[] = "<minFadeExtent>{$this->minFadeExtent}</minFadeExtent>";
        if (isset($this->maxFadeExtent)) $result[] = "<maxFadeExtent>{$this->maxFadeExtent}</maxFadeExtent>";
        $result[] = '</Lod>';
        return implode("\n", $result);
    }

}

