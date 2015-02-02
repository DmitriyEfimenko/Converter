<?php

use helper\DTOToCsv;

class DTOTToCsvTest extends \PHPUnit_Framework_TestCase
{
    protected $fixture;

    protected function setUp()
    {
        $this->fixture = new DTOToCsv();
    }

    protected function tearDown()
    {
        $this->fixture = NULL;
    }


    public function testFileCodeFormat()
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
                ),
                'item' => array(
                    0 => array(
                        '_PartNumber' => '812-AA',
                        'tag'         => 'mouse',
                        'price'       => '12$'
                    ),
                    1 => array(
                        '_PartNumber' => '812-AB',
                        'tag'         => 'keyboard',
                        'price'       => '20$'
                    )
                )
            )
        );
        $this->assertFalse($this->fixture->fileCode($array));
    }
}