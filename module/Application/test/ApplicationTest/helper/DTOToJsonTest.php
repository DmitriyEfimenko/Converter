<?php

use helper\DTOToJson;

class DTOTToJsonTest extends \PHPUnit_Framework_TestCase
{
    protected $fixture;

    protected function setUp()
    {
        $this->fixture = new DTOToJson();
    }

    protected function tearDown()
    {
        $this->fixture = NULL;
    }

    public function testFileCodeTrueFormat()
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
        $this->assertJsonStringEqualsJsonString($this->fixture->fileCode($array), json_encode($array));
    }
}