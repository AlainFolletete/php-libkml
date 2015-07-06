<?php
namespace libKML;
use libKML\features\Feature;
use libKML\features\containers\Container;

/**
 *   kml root element class
 */

class KML {

    /** @var Feature */
    private $feature;
    private $version = KML_DEFAULT_SCHEMA_VERSION;
    private $encoding = KML_DEFAULT_ENCODING;

    public static function createFromText($text) {
        $enc = mb_detect_encoding($text);
        $xml = mb_convert_encoding($text, 'UTF-8', $enc);

        return buildKML(new \SimpleXMLElement($xml));
    }

    public function __construct($feature = null) {
        $this->feature = $feature;
    }

    public function __toString() {
        $output = array();

        $output[] = sprintf("<?xml version=\"1.0\" encoding=\"%s\"?>", $this->encoding);
        $output[] = sprintf("<kml xmlns=\"http://www.opengis.net/kml/%s\">", $this->version);

        if (isset($this->feature)) {
            $output[] = $this->feature->__toString();
        }

        $output[] = '</kml>';

        return implode("\n", $output);
    }

    /**
     *  Generate WKT
     */
    public function toWKT() {
        if (isset($this->feature)) {
            if ($this->feature instanceof Container) {
                return sprintf("GEOMETRYCOLLECTION(%s)", $this->feature->toWKT());
            } else {
                return $this->feature->toWKT();
            }
        }

        return '';
    }

    /**
     *  Generate WKT without z-coordenates
     */

    public function toWKT2d() {
        if (isset($this->feature)) {
            if ($this->feature instanceof Container) {
                return sprintf("GEOMETRYCOLLECTION(%s)", $this->feature->toWKT2d());
            } else {
                return $this->feature->toWKT2d();
            }
        }

        return '';
    }

    public function toJSON() {
        $json_data = array();

        if (isset($this->feature)) {
            $all_features = $this->getAllFeatures();

            $json_data['type'] = 'FeatureCollection';
            $json_data['features'] = array();

            foreach($all_features as $feature) {
                $json_feature = $feature->toJSON();
                if ($json_feature) {
                    $json_data['features'][] = $json_feature;
                }
            }
        }

        return json_encode($json_data);
    }

    public function toExtGeoJSON() {
        $json_data = array();

        if (isset($this->feature)) {
            $all_features = $this->getAllFeatures();

            $json_data['type'] = 'FeatureCollection';
            $json_data['features'] = array();

            foreach($all_features as $feature) {
                /** @var Feature $feature */
                $json_feature = $feature->toExtGeoJSON();
                if ($json_feature) {
                    $json_data['features'][] = $json_feature;
                }
            }
        }

        return json_encode($json_data);
    }

    /**
     * Returns all Styles in the KML
     * @return	array   Array of styles
     */
    public function getAllStyles() {
        $all_styles = array();

        if (isset($this->feature)) {
            $all_styles = array_merge($all_styles, $this->feature->getAllStyles());
        }

        return $all_styles;
    }

    /**
     * Returns all features in the KML
     * @return	array   Array of Features
     */
    public function getAllFeatures() {
        $all_features = array();

        if (isset($this->feature)) {
            $all_features = array_merge($all_features, $this->feature->getAllFeatures());
        }

        return $all_features;
    }

    public function setFeature($feature) {
        if ($feature instanceof Feature) {
            $this->feature = $feature;
        }
    }

    public function getFeature() {
        return $this->feature;
    }
}
