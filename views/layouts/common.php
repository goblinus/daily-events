<?php
    use yii\helpers\Html;
    use app\assets\JQueryAsset;
    use app\assets\BaseAsset;

    JQueryAsset::register($this);
    BaseAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language; ?>">
    <head>
        <title><?php echo Html::encode($this->title) ?></title>
        <meta charset="<?php echo Yii::$app->charset; ?>" />
        <?php $this->head(); ?>
    </head>
    <body>
    <?php $this->beginBody(); ?>
        <?php echo $content; ?>
    <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>
