<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
function calculateAge($pCode)
{
	$dobY=substr($pCode,1,2);
	$dobM=substr($pCode,3,2);
	$dobD=substr($pCode,5,2);
	$d1 = new DateTime(date('y-m-d', time()));
	$d2 = new DateTime($dobY."-".$dobM."-".$dobD);

	$diff = $d2->diff($d1);

	return $diff->y;
}
?>
<div class="users-index">


   

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'first_name',
            'last_name',
			[
				"label" => "Age",
				"value" => function($data){
					return calculateAge($data->personal_code);
									}
			],
			[
				"label" => "Loan Age Eligibility",
				"value" => function($data){
					 if(calculateAge($data->personal_code)<14){
						 return "Not Eligible";}
						 else{
							 return "Eligible";};
									
									}
			],
            'email:email',
            'personal_code',
            'phone',
			
            //'active',
            //'dead',
            //'lang',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
