<?php
namespace app\models\Mock\Faker;

use function time;

use Faker\Generator as Faker;
use Faker\Provider\ru_RU\Text;

class Teaser
{
  const MIN_TEASER_LENGTH = 100;
  const MAX_TEASER_LENGTH = 250;

  protected static $faker = null;

  /**
   * Генерирует анонс случайной длины от 100 до 250 символов
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
      static::MIN_TEASER_LENGTH,
      static::MAX_TEASER_LENGTH
    );

    return str_replace('—', '', static::$faker->realText($length));
  }
}
