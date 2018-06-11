<?php

namespace kornrunner;

use kornrunner\Serializer\HexPrivateKeySerializer;
use Mdanter\Ecc\Curves\CurveFactory;
use Mdanter\Ecc\Curves\SecgCurve;

class HexPrivateKeySerializerTest extends TestCase
{
    protected $serializer;

    public function setUp()
    {
        parent::setUp();
        $generator = CurveFactory::getGeneratorByName(SecgCurve::NAME_SECP_256K1);

        $this->serializer = new HexPrivateKeySerializer($generator);
    }

    public function testParse() {
        $key = $this->serializer->parse($this->testPrivateKey);
        $this->assertEquals(gmp_init($this->testPrivateKey, 16), $key->getSecret());

        $key = $this->serializer->parse('0x' . $this->testPrivateKey);
        $this->assertEquals(gmp_init($this->testPrivateKey, 16), $key->getSecret());
    }

    public function testSerialize() {
        $key = $this->serializer->serialize($this->serializer->parse($this->testPrivateKey));
        $this->assertEquals($this->testPrivateKey, $key);

        $key = $this->serializer->serialize($this->serializer->parse('0x' . $this->testPrivateKey));
        $this->assertEquals($this->testPrivateKey, $key);
    }
}