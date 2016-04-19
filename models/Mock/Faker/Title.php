<?php
namespace app\models\Mock\Faker;

use function time;

use Faker\Generator as Faker;
use Faker\Provider\ru_RU\Text;

class Title
{
  const MIN_TITLE_LENGTH = 20;
  const MAX_TITLE_LENGTH = 85;

  protected static $faker = null;

  /**
   * Генерирует заголовок случайной длины от 20 до 85 символов
   *
   * @return mixed
   */
  public static function create()
  {
    if (null === static::$faker) {
      static::$faker = new Faker();
      static::$faker->seed(time());
      static::$faker->addProvider(new Text(static::$faker));
    }

    $length = static::$faker->numberBetween(
      static::MIN_TITLE_LENGTH,
      static::MAX_TITLE_LENGTH
    );

    return str_replace('—', '', static::$faker->realText($length));
  }
}
