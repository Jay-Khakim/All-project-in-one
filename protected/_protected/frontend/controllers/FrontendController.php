<?php
namespace frontend\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use Yii;

/**
 * FrontendController extends Controller and implements the behaviors() method
 * where you can specify the access control ( AC filter + RBAC) for
 * your controllers and their actions.
 */
class FrontendController extends Controller
{
    /**
     * Returns a list of behaviors that this component should behave as.
     * Here we use RBAC in combination with AccessControl filter.
     *
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'controllers' => ['article'],
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'admin'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'controllers' => ['article'],
                        'actions' => ['create', 'update', 'admin'],
                        'allow' => true,
                        'roles' => ['editor'],
                    ],
                    [
                        'controllers' => ['article'],
                        'actions' => ['index', 'view'],
                        'allow' => true
                    ],
                    [
                        'controllers' => ['profile'],
//                        'actions' => ['index', 'settings'],
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ], // rules

            ], // access

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ], // verbs

        ]; // return

    } // behaviors

//    public function actionInit()
//    {
//        $auth = Yii::$app->authManager;
//
//        // add "user" permission
//        $user = $auth->createPermission('user');
//        $user->description = 'Simple user';
//        $auth->add($user);
//
//        $editor = $auth->createPermission('editor');
//        $editor->description = 'The editor';
//        $auth->add($editor);
//        $auth->addChild($editor, $user);
//
//        // add "admin" role and give this role the "updatePost" permission
//        // as well as the permissions of the "author" role
//        $admin = $auth->createRole('admin');
//        $auth->add($admin);
//        $auth->addChild($admin, $user);
//        $auth->addChild($admin, $editor);
//
//        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
//        // usually implemented in your User model.
//        $auth->assign($user, 3);
//        $auth->assign($editor, 2);
//        $auth->assign($admin, 1);
//    }

} // AppController
