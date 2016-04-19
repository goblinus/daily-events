<?php
namespace app\models\Mock\Faker;

use function time;

use Faker\Provider\Image;
use Faker\Generator as Faker;
use Faker\Provider\ru_RU\Person;

class Author
{
  const GENDER_MALE   = 1;
  const GENDER_FEMALE = 2;

  protected static $faker = null;

  static $gender = [
    self::GENDER_MALE => Person::GENDER_MALE,
    self::GENDER_FEMALE => Person::GENDER_FEMALE
  ];

  /**
   * Генерирует контентный блок случайного типа: текст, картинка или видео
   *
   * @return mixed
   */
  public static function create()
  {
    if (null === static::$faker) {
      static::$faker = new Faker();
      static::$faker->seed(time());
      static::$faker->addProvider(new Person(static::$faker));
      static::$faker->addProvider(new Image(static::$faker));
    }

    $index = static::$faker->numberBetween(
      static::GENDER_MALE,
      static::GENDER_FEMALE
    );

    $person['gender'] = static::$gender[$index];
    $person['image']  = static::$faker->imageUrl(150, 150, 'people');
    $person['last_name']    = static::$faker->lastName($person['gender']);
    $person['first_name']   = static::$faker->firstName($person['gender']);

    switch($person['gender']) {
      case Person::GENDER_MALE:
        $person['middle_name']  = static::$faker->middleNameMale();
      break;

      case Person::GENDER_FEMALE:
        $person['last_name']    .= 'а';
        $person['middle_name']  = static::$faker->middleNameFemale();
      break;
    }

    return $person;
  }
}