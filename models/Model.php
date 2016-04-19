<?php
namespace app\models;

/*********************************************************************************************
 * Основной класс предок всех сущностей приложения
 *
 * @date 19/04/2016
 */
use yii\base\UnknownPropertyException;

abstract class Model
{
  const DEFAULT_UNSERIALIZE_ERROR = 'Invalid serialized value of object';

  protected $data = null;

  /**
   * Object getter
   *
   * @access public
   * @param string $field
   * @return mixed
   * @throws yii\base\UnknownPropertyException
   */
  public function __get($field)
  {
    if (!isset($this->data[$field])) {
      throw new UnknownPropertyException(
        "Property {$field} doesn't exist"
      );
    }

    return $this->data[$field];
  }

  /**
   * Object setter
   *
   * @access public
   * @param string $field
   * @param mix $value
   * @return app\models\Model $this
   * @throws yii\base\UnknownPropertyException
   */
  public function __set($field, $value)
  {
    if (!isset($this->data[$field])) {
      throw new UnknownPropertyException(
        "Property {$field} doesn't exist"
      );
    }

    $this->data[$field] = $value;

    return $this;
  }

  /**
   * Returns the values of object as array
   *
   * @access public
   * @return array
   */
  public function toArray(): array
  {
    $result = [];
    foreach($this->data as $key => $value) {
      if ($value instanceof Model) {
        $value = $value->toArray();
      }
      $result[$key] = $value;
    }

    return $result;
  }

  /**
   * Serializes values of object
   *
   * @access public
   * @return string
   */
  public function serialize(): string
  {
    return serialize($this->toArray());
  }

  /**
   * Initializes the object's values
   *
   * @access public
   * @param array $data
   * @return app\models\Model
   */
  public function init(array $data): Model
  {
    foreach($data as $field => $value) {
      if (isset($this->data[$field]) && is_string($value)) {
        $this->data[$field] = $value;
      }
    }

    return $this;
  }
}