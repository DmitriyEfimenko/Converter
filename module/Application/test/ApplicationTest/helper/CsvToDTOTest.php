<?php

use helper\CsvToDTO;

class CsvToDTOTest extends \PHPUnit_Framework_TestCase
{
    protected $fixture;

    protected function setUp()
    {
        $this->fixture = new CsvToDTO();
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
            'root' => array(
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
        );
        $this->assertEquals(@$this->fixture->dtoDecod($file),$array);
    }

    public function providerDtoDecodFormat()
    {
        $array = array(array('testData/emptyDataCsv.csv'),array('testData/trueFormatDataCsv.csv'));
        return $array;
    }
}