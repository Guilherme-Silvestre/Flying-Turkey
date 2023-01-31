<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Imagem;
use yii\web\UploadedFile;
use app\models\UploadForm;
use common\models\Produto;
use yii\filters\VerbFilter;
use common\models\ProdutoSearch;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

/**
 * ProdutoController implements the CRUD actions for Produto model.
 */
class ProdutoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'actions' => ['index','update','view','updateimg','deleteimg'],
                            'allow' => true,
                            'roles' => ['admin' , 'employe'],
                        ],
                        [
                            'actions' => ['create','delete'],
                            'allow' => true,
                            'roles' => ['admin'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Produto models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProdutoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Produto model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Produto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Produto();
        $uploadForm = new UploadForm();
        $novaimagem = new Imagem();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $uploadForm->imageFile = UploadedFile::getInstance($uploadForm,'imageFile');
                $nomeimagem = date('mdyhis');

                if($uploadForm->upload($nomeimagem))
                {
                    
                    if($model->save())
                    {
                        $novaimagem->nome = $nomeimagem . '.' . $uploadForm->imageFile->extension;
                        $novaimagem->produto_id = $model->id;

                        $novaimagem->save();
                        
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                }   
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'uploadForm' => $uploadForm,
        ]);
    }

    /**
     * Updates an existing Produto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionUpdateimg($id)
    {
        $model = Produto::find()->where(['id' => $id])->one();
        $uploadForm = new UploadForm();
        $novaimagem = new Imagem();

        if ($this->request->isPost) {
             ($model->load($this->request->post()));
                $uploadForm->imageFile = UploadedFile::getInstance($uploadForm,'imageFile');
                $nomeimagem = date('mdyhis');

                if($uploadForm->upload($nomeimagem))
                {
                        $novaimagem->nome = $nomeimagem . '.' . $uploadForm->imageFile->extension;
                        $novaimagem->produto_id = $model->id;

                        $novaimagem->save();

                        return $this->redirect(['view', 'id' => $model->id]);
                }
            
        } 
        return $this->render('update-img', [
            'model' => $model,
            'uploadForm' => $uploadForm,
        ]);
    }
    
    public function actionDeleteimg($id)
    {
        $model = Imagem::find()->where(['id' => $id])->one();

        if(file_exists(Yii::getAlias("@common") . "/imagens/" . $model->nome))
        {
            unlink(Yii::getAlias("@common") . "/imagens/" . $model->nome);
            $model->delete();

            return $this->redirect(Yii::$app->request->referrer);
        }
    }
   

    /**
     * Deletes an existing Produto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        

        $imagens = Imagem::find()->where(['produto_id' => $id])->all();

        foreach($imagens as $imagem)
        {
            if(file_exists(Yii::getAlias("@common") . "/imagens/" . $imagem->nome))
            {
                unlink(Yii::getAlias("@common") . "/imagens/" . $imagem->nome);
                $imagem->delete();
            }
        }
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Produto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Produtos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Produto::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
