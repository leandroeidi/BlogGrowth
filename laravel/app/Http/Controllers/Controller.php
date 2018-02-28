<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
  /**
   * 全てのキーをキャメルケースへ変換します。
   *
   * @param array $target 変換対象の配列
   * @return array キー変換後の配列
   */
  public static function camelizeAllKeys(array $target) : array {
    $result = [];
    foreach ($target as $key => $value) {
      if (is_array($value) === true) $value = self::camelizeAllKeys($value);
      $result[camel_case($key)] = $value;
    }

    return $result;
  } 
}
