<?php

class KMLTest extends PHPUnit_Framework_TestCase {

    public function test_createFromText() {
        $result = \libKML\KML::createFromText('<kml></kml>');
        $this->assertInstanceOf('\libKML\KML', $result);
    }

}
