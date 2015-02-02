<?php

use helper\DTOToXml;

class DTOToXmlTest extends \PHPUnit_Framework_TestCase
{
    protected $fixture;

    protected function setUp()
    {
        $this->fixture = new DTOToXml();
    }

    protected function tearDown()
    {
        $this->fixture = NULL;
    }



    public function testFileCodeTrue()
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
        $this->assertXmlStringEqualsXmlFile('testData/trueFormatDataXml.xml', @$this->fixture->fileCode($array));
    }
}