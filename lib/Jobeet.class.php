<?php
class Jobeet
{
  static public function slugify($text)
  {
    // replace non letter or digits by -
    $text = preg_replace_callback('#[^\\pL\d]+#u', function ($matches) {
      return '-';
    }, $text);


    // trim
    $text = trim($text, '-');

    if (function_exists('iconv')) {
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    }

    // lowercase
    $text = strtolower($text);

    // remove unwanted characters
    $text = preg_replace_callback('#[^-\w]+#', function ($matches) {
      return '';
    }, $text);

    if (empty($text)) {
      return 'n-a';
    }

    return $text;
  }
}
