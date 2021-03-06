<?php
/**
 * @author Nurbek Nurjanov <nurbek.nurjanov@mail.ru>
 * @link http://sakuracommerce.com/
 * @copyright Copyright (c) 2018 Sakuracommerce
 * @license http://sakuracommerce.com/license/
 */

/* @var $model Product */
use product\models\Product;
use yii\helpers\Url;
use kartik\rating\StarRating;
use extended\helpers\StringHelper;
use extended\helpers\Html;
use order\models\Basket;

$basketProducts = Basket::findAll();
?>
<div class="col-lg-2 col-sm-3 col-xs-4 list-block" >
    <div>
        <a href="<?=Url::to($model->url)?>"  class="<?=$model->typeClass?>" data-discount="<?=$model->discount?>" >
            <?php
            if($mainImage = $model->mainImage)
                //if($mainImage = $model->getImages()->queryMainImage()->one())
                echo $mainImage->getImg('sm');
            else
                echo Html::noImg();
            ?>
        </a>
        <div class="title"><?=Html::a(StringHelper::truncate($model->title, 30), $model->url, ['class'=>'title']);?></div>
        <div><?=Yii::$app->formatter->asCurrency($model->price);?></div>
        <div><?php //echo $model->statusText;?></div>
        <div>
            <?=StarRating::widget([
                //'id' => 'product-rating-'.$model->id,
                'name' => 'product-rating-'.$model->id,
                'value' => $model->rating
            ]);?>
        </div>
        <?=Html::a(Yii::t('product', 'Buy'), 'javascript:void(0);',
            [
                'id'=>'showBasket-'.$model->id,
                'class'=>'btn btn-warning btn-sm showBasket '.(isset($basketProducts[$model->id])?"showBasketActive":null),
                'data'=>[
                    'count'=>isset($basketProducts[$model->id]) ? $basketProducts[$model->id]['count']:1,
                    'product_id'=>$model->id,
                    'price'=>$model->price,
                    'title'=>$model->title,
                    'group_id'=>$model->group_id,
                ],
            ]);?>
    </div>
</div>