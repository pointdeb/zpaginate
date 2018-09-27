<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Zpaginate\Zpaginate;

class ZpaginateTest extends TestCase
{
    public function testCreateZpaginate()
    {

        $this->assertEquals(Zpaginate::class, get_class(new Zpaginate()));
    }

    public function testPaginateData()
    {
        $data = [];
        for ($i = 0; $i <= 15; $i ++ ) {
            $data[] = ['name' => "Name $i"];
        }

        $result = Zpaginate::paginateData($data, 2, 5);

        $this->assertEquals(5, count($result));

        $result = Zpaginate::paginateData($data, 3, 5);

        $this->assertEquals(1, count($result));

    }

    public function testPaginateLinks()
    {
        $data = [];
        for ($i = 0; $i < 10; $i ++ ) {
            $data[] = ['name' => "Name $i"];
        }

        $result = Zpaginate::paginateLinks(count($data), 3, 5, 3);

//        print_r($result);

        $this->assertEquals(2, count($result));

    }

    public function testPaginate()
    {
        $data = [];
        for ($i = 0; $i < 20; $i ++ ) {
            $data[] = ['name' => "Name $i"];
        }

        $result = Zpaginate::paginate($data, 3, 5, 3);

//        print_r($result);

        $this->assertArrayHasKey('data', $result);
        $this->assertArrayHasKey('links', $result);

        $this->assertEquals(5, count($result['data']));
        $this->assertEquals(2, count($result['links']));


    }
}

?>