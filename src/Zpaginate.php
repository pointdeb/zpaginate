<?php

namespace Zpaginate;

class Zpaginate
{

    public static function paginateData(array $data = [], $current = 0, $per_page = 5)
    {
        // asjust current
        $current = $current <= 0 ? 0 : $current;
        $current = $current > ceil(count($data) / $per_page) - 1 ? ceil(count($data) / $per_page) - 1 : $current;
        // declare limit offset
        $limit = $per_page * $current;
        $offset = $limit + $per_page;
        // adjust offset;
        $offset = $offset >= count($data) ? count($data) : $offset;

        return array_slice($data, $limit, $offset);
    }

    public static function paginateLinks($total = 0, $current = 0, $per_page = 5, $per_link = 3)
    {
        // return if no data
        if (!$total || $total == 0) {
            return [];
        }

        $max_page = ceil($total / $per_page) - 1;

        // asjust current
        $current = $current <= 0 ? 0 : $current;
        $current = $current > $max_page ? $max_page : $current;
        // declare min, max
        $min = $current;
        $max = $current;
      // get min
      while ($min % $per_link != 0 && $min > 0) {
          $min--;
      }
      // get max
      while ($max % $per_link != 0 && $max < $max_page) {
          $max++;
      }

      // adjust max

      if ($max == $min) {
          $max = $min + $per_link >= $max_page ? $max_page : $min + $per_link;
      }

      // generate links
      $links = [];
      for ($i = $min; $i <= $max; $i++) {
        $links[] = ['active' => $i, 'label' => $i + 1, 'value' => $i];
      }

      // set prev
      if (count($links) > 0 && $links[0]['value'] != 0) {

          array_unshift($links, ['active' => false, 'label' => '<<', 'value' => $links[0]['value'] - 1]);
      }
      // set next
      if (count($links) > 2) {
          $shouldNextIndex = count($links) - 1;
          $shouldNext = $links[$shouldNextIndex];

          if ($shouldNext['value'] % $per_link === 0) {
              $links[$shouldNextIndex] = ['active' => false, 'label' => '>>', 'value' => $shouldNext['value']];
        }
      }
      // make empty links if only one page
      if (count($links) == 1 && $links[0]['value'] == 0) {
          $links = [];
      }

      return $links;
    }

    public static function paginate(array $data = [], $current = 0, $per_page = 5, $per_link = 3)
    {
        return ['data' => self::paginateData($data, $current, $per_page), 'links' => self::paginateLinks(count($data), $current, $per_page, $per_link)];
    }
}