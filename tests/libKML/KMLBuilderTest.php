<?php

class KMLBuilderTest extends PHPUnit_Framework_TestCase {

    public function test_buildNetworkLink() {
        $xml = new SimpleXMLElement('<NetworkLink><Link><href>test.kmz</href></Link></NetworkLink>');
        $result = \libKML\buildNetworkLink($xml);
        $this->assertInstanceOf('\libKML\features\NetworkLink', $result);
        $this->assertInstanceOf('\libKML\links\Link', $result->getLink());
        $this->assertEquals('test.kmz',$result->getLink()->getHref());
    }

}
