<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\Loan;


class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
	public function actionImport()
	{
		//loan import begins...
		Yii::$app->db->createCommand()->truncateTable('loan')->execute();   //we are deleting old data to Reset it.
	
              $loansJSON=json_decode(file_get_contents(Yii::getAlias('@app')."/loans.json"));
              foreach($loansJSON as $obj)
              {
				  
	              $model=new Loan();
				  $data["id"]=$obj->id;
		          $data["user_id"]=$obj->user_id;
		          $data["amount"]=$obj->amount;
		          $data["interest"]=$obj->interest;
		          $data["duration"]=$obj->duration;
		          $data["start_date"]=date('Y-m-d',$obj->start_date);
		          $data["end_date"]=date('Y-m-d',$obj->end_date);
		          $data["campaign"]=$obj->campaign;
		          $data["status"]=$obj->status;
		          $r=array("Loan"=>$data);
		          $model->load($r);
		          $model->save();
				  
              }
    
			  //loan import ends...
			  
			  //user import begins...
			Yii::$app->db->createCommand()->truncateTable('user')->execute();   //we are deleting old data to Reset it.
			
	              $usersJSON=json_decode(file_get_contents(Yii::getAlias('@app')."/users.json"));
	              foreach($usersJSON as $obj)
	              {
 		              $model=new User();
			          $data["id"]=$obj->id;
			          $data["first_name"]=$obj->first_name;
			          $data["last_name"]=$obj->last_name;
			          $data["email"]=$obj->email;
			          $data["personal_code"]=$obj->personal_code;
			          $data["phone"]=$obj->phone;
			          $data["active"]=$obj->active;
			          $data["dead"]=$obj->dead;
			          $data["lang"]=$obj->lang;
			          $r=array("User"=>$data);
			          $model->load($r);
			          $model->save();
					  $id=$model->getPrimaryKey();
					  $loanModel = Loan::findAll(['user_id' => $obj->id]);
					  for($i=0;$i<sizeof($loanModel);$i++)
					  {
						  $loanModel[$i]->updateAttributes(['user_id' => $id]);
					  	
					  }
					  
	              }
	        
	        return $this->render('importdone');
	    }
		
		
}
