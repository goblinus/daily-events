<?php
namespace app\models\Mock\Faker;

use function time;

use Faker\Generator as Faker;
use Faker\Provider\DateTime as DateTimeProvider;

class DateTime
{
  const NOW       = 'now';
  const LAST_YEAR = '-1 year';

  protected static $faker = null;

  /**
   * Генерирует случайную дату в промежутке -1 год от текущей даты до текущей даты
   *
   * @return mixed
   */
  public static function create()
  {
    if (null === static::$faker) {
      static::$faker = new Faker();
      static::$faker->addProvider(new DateTimeProvider(static::$faker));
    }

    return static::$faker->dateTimeBetween(static::LAST_YEAR, static::NOW);
  }
}
