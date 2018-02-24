> composer require pointdeb/zpaginate
```php
<?php
use Zpaginate\Zpaginate;


public function testPaginate()
{
    $data = [];
    for ($i = 0; $i < 10; $i ++ ) {
        $data[] = ['name' => "Name $i"];
    }

    $result = Zpaginate::paginate($data, 3, 5, 3);

    print_r($result);

    $this->assertArrayHasKey('data', $result);
    $this->assertArrayHasKey('links', $result);

    $this->assertEquals(5, count($result['data']));
    $this->assertEquals(2, count($result['links']));


}

?>