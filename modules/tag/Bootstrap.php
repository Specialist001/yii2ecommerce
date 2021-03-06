<?php

namespace tag;

use article\assets\ArticleAsset;
use product\url_rules\ProductUrlRule;
use Yii;
use yii\base\BootstrapInterface;

/**

 * @author Nurbek Nurjanov nurbek.nurjanov@mail.ru
 * @link http://sakuracommerce.com/
 * @copyright Copyright (c) 2016 Sakuracommerce
 * @license http://sakuracommerce.com/license/
 
 */
class Bootstrap implements BootstrapInterface {

    /**
     * Initial application compoments and modules need for extension
     * @param \yii\base\Application $app The application currently running
     * @return void
     */
    public function bootstrap($app) {

        Yii::$app->view->registerAssetBundle(ArticleAsset::class);

        if (!isset(Yii::$app->get('i18n')->translations['tag*'])) {
            Yii::$app->get('i18n')->translations['tag*'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => __DIR__ . '/messages',
            ];
        }
    }
}
