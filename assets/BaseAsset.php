<?php
namespace app\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Class BaseAsset
 * Implements the base themes (styles, images and javascripts) for Daily-Events web project
 * @package app\assets
 */
class BaseAsset extends AssetBundle
{
    /** @var string $sourcePath path to source files of the asset bundle */
    public $sourcePath  = '@app/assetBundles/app';
    /** @var string  */
    public $basePath    = '@webroot';
    /** @var   */
    public $baseUrl     = '@web';

    /** @var array $css style files to include */
    public $css = [
        'css/bootstrap.css',
        'css/bootstrap-responsive.css',
        'css/dailyevents.css',
    ];

    /** @var array $jsOptions params to publish js files in document's head */
    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];

    /** @var array $cssOptions params to publish css files in document's head */
    public $cssOptions = [
        'position' => View::POS_HEAD,
    ];

    /** @var array $js javascript files to include */
    public $js = [
        'js/bootstrap.js',
    ];

    /** @var array $depends list of asset dependencies */
    public $depends = [
        'app\assets\JQueryAsset',
    ];
}
