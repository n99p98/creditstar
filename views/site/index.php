<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
         <p>This solution is provided by <b>Nitin Chaudhary (nitin@npkgroups.com , gniit@nitin@gmail.com)</b> for CreditStar Recruitment Process.<p>
			 <br/>
		     <?= Html::a('Clean Import of Users.json & Loan.json','index.php?r=site/import', ['class' => 'button-orange button-large']) ?>
    </div>

    
</div>
