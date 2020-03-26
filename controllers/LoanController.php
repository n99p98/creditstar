<?php

namespace app\controllers;

use Yii;
use app\models\Loan;
use app\models\User;
use app\models\LoanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LoanController implements the CRUD actions for Loans model.
 */
class LoanController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Loans models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LoanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		//var_dump($dataProvider);
        $users=new User();
       // $allUsers=$users->find()->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    /**
     * Displays a single Loans model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
		
        $mdl=$this->findModel($id);
        $user=new User();
        $mdl2=$user->find()->where('id='.$mdl->user_id)->all();
		$mdl2=$mdl2[0];
    	//  var_dump($mdl2);


        $name=$mdl2->first_name." ".$mdl2->last_name;
		
        return $this->render('view', [
            'model' => $mdl,
            'userName' => $name
        ]);
    }

    /**
     * Creates a new Loans model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Loan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $users=new User();
        $allUsers=$users->find()->all();
        $supplyUsers=[];
        for($i=0;$i<sizeof($allUsers);$i++)
        {
         $perUser=$allUsers[$i];
         $id=$perUser["id"];
         $name=$perUser["first_name"];
        $supplyUsers[$id]=$name; 
        }
       // var_dump();
               //$supplyUser[0]="A";
        return $this->render('create', [
            'allUsers' => $supplyUsers,
            'model' => $model
        ]);
        
        
    }

    /**
     * Updates an existing Loans model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
$users=new User();
        $allUsers=$users->find()->all();
        $supplyUsers=[];
        for($i=0;$i<sizeof($allUsers);$i++)
        {
         $perUser=$allUsers[$i];
         $id=$perUser["id"];
         $name=$perUser["first_name"];
        $supplyUsers[$id]=$name; 
        }
        return $this->render('update', [
            'model' => $model,
            'allUsers' => $supplyUsers,

        ]);
    }

    /**
     * Deletes an existing Loans model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
	
	public function getUserName()
	{
		return "Nitin";
	}

    /**
     * Finds the Loans model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Loans the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Loan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
