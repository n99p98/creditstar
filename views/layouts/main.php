<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


</head>
<body>
<?php $this->beginBody() ?>


<div id="page-header" class="contain-to-grid hide-for-print show-for-medium-up">
    <div class="top-bar" data-topbar="">
        
        
    <section class="top-bar-section">
            <ul class="customer-service show-for-medium-up">
                <li>Customer support</li>
                <li class="customerservice-icon"><img src="https://www.creditstar.co.uk/img/ico-customerservice.png" alt="Customer support">020 3695 7544                </li>
                <li class="openingtimes-icon"><img src="https://www.creditstar.co.uk/img/ico-openingtimes.png" alt="Open: ">Monday-Friday 9AM-5PM                </li>
                <li class="openingtimes-icon"></li>
            </ul>
        </section><section class="top-bar-section client-area">
            <ul class="right">
                <li style="float: left;" class="hide-for-medium-up">
                    <img src="https://www.creditstar.co.uk/img/ico-customerservice.png" alt="Customer support"> 020 3695 7544                </li>

                                    <li>
                        <a class="button-orange" href="/site/login">
                            <div class="icon login"></div>Log in                        </a>
                    </li>
                    <li>
                                                    <a class="button-orange" href="/site/signup">
                                Register                            </a>
                                            </li>
                            </ul>
        </section></div>
</div>

<div id="main-menu" class="contain-to-grid down-shadow hide-for-print show-for-medium-up">
    <nav class="top-bar" data-topbar="">
        <ul class="title-area">
            <li class="name">
                    <a href="/index.php" class="top-bar-logo">
    <img src="https://www.creditstar.co.uk/img/cs_logo.svg" width="156" height="34" alt="Creditstar">
        </a>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a>
            </li>
        </ul>
        
    <section class="top-bar-section client-area">
            <ul class="right"><li><a href="/site/howitworks">How it works</a></li>
<li><a href="/site/help">Help centre</a></li>
<li><a href="/site/about">About us</a></li>
<li><a href="/site/responsible">Responsible lending</a></li>
<li><a href="/blog">Blog</a></li></ul>        </section></nav>

    </div>

<div class="page-wrapper">
            <div id="content">
 <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'options' => array('style'=>'margin-left:0px;padding-left: 9.8em;padding-top: 17px;padding-bottom: 17px;', 'class' => 'breadcrumb')
        ]) ?>
<div class="row pull-down-40" style="position: relative;">
   
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
<div class="row pull-down-20">

                                        <?= Html::a('All Loans', 'index.php?r=loan', ['class' => 'button-orange button-large']) ?>
                                        
                                        <?= Html::a('Create New Loan', 'index.php?r=loan/create', ['class' => 'button-orange button-large']) ?>
                                        <?= Html::a('All Users','index.php?r=users', ['class' => 'button-orange button-large']) ?>
                                        <?= Html::a('Create New User','index.php?r=users%2Fcreate', ['class' => 'button-orange button-large']) ?>
                                       
										


</div>
<br/>
</div>


<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
   
	jQuery( document ).ready(function() {
 jQuery('.datePicker').datepicker();	});
</script>
</body>
</html>
<?php $this->endPage() ?>
