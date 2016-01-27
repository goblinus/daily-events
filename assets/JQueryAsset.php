<?php
namespace app\assets;

use yii\web\AssetBundle;

/**
 * Class BaseAsset
 * Implements the base themes (styles, images and javascripts) for Daily-Events web project
 * @package app\assets
 */
class JQueryAsset extends AssetBundle
{
    /** @var string $sourcePath path to source files of the asset bundle */
    public $sourcePath  = '@app/assetBundles/jquery';
    /** @var string  */
    public $basePath    = '@webroot';
    /** @var   */
    public $baseUrl     = '@web';


    /** @var array $js javascript files to include */
    public $js = [
        'js/jquery-2.2.0.js',
    ];
}
