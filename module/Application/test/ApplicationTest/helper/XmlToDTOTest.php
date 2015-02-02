<?php

use helper\XmlToDTO;

class XmlToDTOTest extends \PHPUnit_Framework_TestCase
{
    protected $fixture;

    protected function setUp()
    {
        $this->fixture = new XmlToDTO();
    }

    protected function tearDown()
    {
        $this->fixture = NULL;
    }

    /**
     * @dataProvider providerDtoDecodFormat
     * @param $file
     */

    public function testDtoDecodFalseFormat($file)
    {
        $this->assertFalse(@$this->fixture->dtoDecod($file));
    }

    /**
     * @dataProvider providerDtoDecodFormat
     * @param $file
     */

    public function testDtoDecodTrueFormat($file)
    {
        $array = array(
            'windows' => array(
                'window' => array(
                    0 => array(
                        '_PartNumber' => '872-AA',
                        'name'        => 'second_window',
                        'width'       => '600',
                        'height'      => '600'
                    ),
                    1 => array(
                        '_PartNumber' => '872-AB',
                        'name'        => 'first_window',
                        'width'       => '1900',
                        'height'      => '1200'
                    )
                )
            )
        );
        $this->assertEquals(@$this->fixture->dtoDecod($file),$array);
    }

    public function providerDtoDecodFormat()
    {
        $array = array(array('testData/emptyDataXml.xml'),array('testData/falseFormatDataXml.xml'),array('testData/trueFormatDataXml.xml'));
        return $array;
    }
}