<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
use yii\helpers\Url;
use yii\helpers\BaseStringHelper;


//$this->title = 'Страницы сайта';
$this->params['breadcrumbs'][] = $this->title;
?>

<!---------------------------------Секция вертикальная подборка материалов---------------------------------------------->
<div class="row selection">
    <div class="col-xs-24  selection-vertical">
        <!--заголовок-->
        <div class="row">
            <div class="h3-box-selection">
                <span class="sprite sprite-circle-ph"></span>
                <h3 class="h3-selection b-dash-light-red"><?= Html::encode($this->title) ?></h3>
<!--                <p class="h3-control">
                    <a class="control-but">Смотреть все</a>
                </p>-->
            </div>
        </div>
        <div class="row">
            <!--материалы -->
<?php foreach($posts as $post): ?>
            <!--1-->
            <div class="col-md-24 col-sm-24 col-xs-24 selection-vertical-content  block-style-1 block-shadow hover-horder">
                <div class="row box-block-w100-h100">
<!--                    ссылка покрывает весь блок-->
                    <a href="<?=Url::toRoute(['/blog/post', 'alias' => $post->alias]);?>" class="block-w100-h100"></a>
                    <div class="col-md-7 col-sm-7 col-xs-7">
                        <a href=""><?= Html::img('@web/css/img/index.jpg', ['alt'=>'', 'class'=>'img-selection-horizontal']);?></a>
                    </div>
                    <div class="col-md-17 col-sm-17 col-xs-17">
                        <div class="textbox-selection-vertical">
                            <h4 class="h4-selection-vertical"><a href="<?=Url::toRoute(['/blog/post', 'alias' => $post->alias]);?>"><?= Html::encode($post->h1); ?></a></h4>
                            <p><?=BaseStringHelper::truncateWords(strip_tags($post->description), 28, $suffix = '...' );?></p>
                        </div>
                    </div>
                </div>
                <ul class="icon-box">
                    <li><a href=""><span class="sprite sprite-ico-arrow"></span><small>0</small></a></li>
                    <li><a href=""><span class="sprite sprite-ico-heart"></span><small>15</small></a></li>
                    <li><a href=""><span class="sprite sprite-ico-comment"></span><small>1</small></a></li>
                </ul>
            </div>
<?php endforeach; ?>
        </div>
    </div>
</div>









<!--<div class="site-index">
<h1><?= Html::encode($this->title) ?></h1>

<blockquote><p>Все страницы блога выводятся по очереди тут...</p></blockquote>


    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <?php foreach($posts as $post): ?>
                            <div>
                                <h2><a href="<?=Url::toRoute(['/blog/post', 'alias' => $post->alias]);?>"><?=$post->h1;?></a></h2>
                                <p>
                                    <?=$post->description;?>
                                </p>
                                <small>Дата аубликации: <?=$post->createdDate;?></small>
                                <p>
                                    <a class="btn btn-default" href="<?=Url::toRoute(['/blog/post', 'alias' => $post->alias]);?>">Читать пост &raquo;</a>
                                </p>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="col-lg-4">
                            <div class="list-group">
                                <div class="list-group-item active">Категории блога</div>

                                <?php foreach($categoris as $category): ?>
                                <a href="<?=Url::toRoute(['/blog/category', 'alias' => $category->alias]);?>" class="list-group-item"><?=$category->title;?></a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

    </div>
</div>-->
