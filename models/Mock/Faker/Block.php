<?php
namespace app\models\Mock\Faker;

use function time;

use Faker\Provider\Image;
use Faker\Generator as Faker;
use Faker\Provider\ru_RU\Text;

class Block
{
  const MIN_BLOCK_LENGTH = 200;
  const MAX_BLOCK_LENGTH = 600;

  const BLOCK_TYPE_TEXT   = 1;
  const BLOCK_TYPE_IMAGE  = 2;
  const BLOCK_TYPE_VIDEO  = 3;

  protected static $faker = null;

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
      static::$faker->addProvider(new Text(static::$faker));
      static::$faker->addProvider(new Image(static::$faker));
    }

    $length = static::$faker->numberBetween(
      static::MIN_BLOCK_LENGTH,
      static::MAX_BLOCK_LENGTH
    );

    $type = static::$faker->numberBetween(
      static::BLOCK_TYPE_TEXT,
      static::BLOCK_TYPE_VIDEO
    );

    $block['type']      = $type;
    $block['position']  = null;
    switch($type) {
      case static::BLOCK_TYPE_TEXT:
        $block['content'] = static::$faker->realText($length);
      break;

      case static::BLOCK_TYPE_IMAGE:
      case static::BLOCK_TYPE_VIDEO:
        $block['content'] = static::$faker->imageUrl(400, 300, 'business');
      break;
    }

    return $block;
  }
}
