<?php

namespace kornrunner;

class HexSignatureSerializerTest extends TestCase
{

    public function testParse() {
        $sig = $this->sigSerializer->parse($this->signed);
        $r = $sig->getR();
        $s = $sig->getS();
        $this->assertEquals($this->signed, gmp_strval($r, 16) . gmp_strval($s, 16));

        $sig = $this->sigSerializer->parse('0x' . $this->signed);
        $r = $sig->getR();
        $s = $sig->getS();
        $this->assertEquals($this->signed, gmp_strval($r, 16) . gmp_strval($s, 16));
    }

    public function testSerialize() {
        $sig = $this->sigSerializer->parse($this->signed);
        $signed = $this->sigSerializer->serialize($sig);
        $this->assertEquals($this->signed, $signed);

        $sig = $this->sigSerializer->parse('0x' . $this->signed);
        $signed = $this->sigSerializer->serialize($sig);
        $this->assertEquals($this->signed, $signed);
    }
}