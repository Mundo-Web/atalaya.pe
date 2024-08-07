<?php

namespace App\Http\Controllers;

class UtilController
{
  static function html2wa(String $string = '')
  {

    $string = str_replace('{{session.sign}}', '', $string);

    $string = preg_replace_callback('/<p>(.*?)<\/p>/', function ($matches) {
        return "\n" . trim($matches[1]);
      }, $string);
    $string = preg_replace_callback('/<strong>(.*?)<\/strong>/', function ($matches) {
      return '*' . trim($matches[1]) . '*';
    }, $string);
    $string = preg_replace_callback('/<b>(.*?)<\/b>/', function ($matches) {
      return '*' . trim($matches[1]) . '*';
    }, $string);
    $string = preg_replace_callback('/<i>(.*?)<\/i>/', function ($matches) {
      return '_' . trim($matches[1]) . '_';
    }, $string);
    $string = preg_replace_callback('/<em>(.*?)<\/em>/', function ($matches) {
      return '_' . trim($matches[1]) . '_';
    }, $string);
    $string = preg_replace_callback('/<s>(.*?)<\/s>/', function ($matches) {
      return '~' . trim($matches[1]) . '~';
    }, $string);
    $string = preg_replace_callback('/<code>(.*?)<\/code>/', function ($matches) {
      return '```' . trim($matches[1]) . '```';
    }, $string);
    $string = preg_replace_callback('/<pre>(.*?)<\/pre>/', function ($matches) {
      return '```' . trim($matches[1]) . '```';
    }, $string);
    $string = preg_replace_callback('/<blockquote>(.*?)<\/blockquote>/', function ($matches) {
      return "\n> " . trim($matches[1]);
    }, $string);
    $string = str_replace('<br>', "\n", $string);
    $string = str_replace('</br>', "\n", $string);

    // Removing remaining HTML tags
    $string = preg_replace('/<[^>]*>?/', '', $string);

    return trim($string);
  }
}
