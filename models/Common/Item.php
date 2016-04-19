<?php
namespace app\models\Common;

use app\models\Model;
use app\models\ItemInterface;
use DateTime;

class Item extends Model implements ItemInterface
{

  protected $data  = null;

  public function __construct()
  {
    $this->data = [
      'title'   => null,
      'teaser'  => null,
      'authors' => null,
      'source'  => null,
      'content' => null,
      'date_created'          => null,
      'original_date_created' => null,
    ];
  }

  public function init(array $value): Item
  {
    foreach($value as $field => $value) {
      switch($field) {
        case 'title':
        case 'teaser':
          $this->data[$field] = $value;
        break;

        case 'date_created':
        case 'original_date_created':
          $this->data[$field] = DateTime::createFromFormat(
            'Y-m-d H:i:s',
            $value
          );
        break;

        case 'authors':
          if (is_array($value)) {
            $this->data['authors'] = [];
            foreach($value as $data) {
              $this->data['authors'][] = (new \app\models\Common\Author())->init($data);
            }
          }
        break;
      }
    }

    return $this;
  }


  /**
   * @inherited
   */
  public function toArray()
  {
    $result = [
      'title'   => $this->data['title'],
      'teaser'  => $this->data['teaser'],
      'source'  => $this->data['source']->toArray(),
      'date_created'          => $this->data['date_created']->format('Y-m-d H:i:s'),
      'original_date_created' => $this->data['original_date_created']->format('Y-m-d H:i:s'),
      'authors' => [],
      'content' => [],
    ];

    array_walk($this->data['authors'], function($author) use (&$result) {
      $result['authors'][] = $author->toArray();
    });

    array_walk($this->data['content'], function($block) use (&$result) {
      $result['content'][] = $block->toArray();
    });

    return $result;
  }
}