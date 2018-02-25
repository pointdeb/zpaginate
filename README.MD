> composer require pointdeb/zpaginate dev-master
```php
<?php
use Zpaginate\Zpaginate;

```..............
```php

public function testPaginate()
{
    // initialize data

    $data = [];
    for ($i = 0; $i < 10; $i ++ ) {
        $data[] = ['name' => "Name $i"];
    }

    // set params

    $current = 3;
    $per_page = 5;
    $per_link = 3;

    // execute paginate

    $result = Zpaginate::paginate($data, $current, $per_page, $per_link);

    // hope you'l see the output
    
    print_r($result);
}

```..............
```php

?>