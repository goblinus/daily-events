<?php
namespace app\models\Common;

/***************************************************************************************************
 * Класс Author: хранит данные и реализует логику работы с сущностью "автор публикации"
 *
 * @date 2016/04/19
 */
use app\models\Model;

class Author extends Model
{
  public function __contract()
  {
    $this->data = [
      'gender'      => null,
      'first_name'  => null,
      'middle_name' => null,
      'last_name'   => null,
      'avatar'      => null,
    ];
  }

  /**
   * @inherited
   */
  public function toArray()
  {
    return $this->data;
  }
}
