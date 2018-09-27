### Builds
[![Build Status](https://travis-ci.org/pointdeb/zpaginate.svg?branch=master)](https://travis-ci.org/pointdeb/zpaginate)

> composer require pointdeb/zpaginate

```php
<?php
use Zpaginate\Zpaginate;

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
    $allow_over_max_page = false;

    // execute paginate

    $result = Zpaginate::paginate($data, $current, $per_page, $per_link, $allow_over_max_page);

    // hope you'l see the output
    
    print_r($result);
}

?>
```