<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        
        $addStock = $auth->createPermission('addStock');
        $addStock->description = 'Add Stock';
        $auth->add($addStock);

        $removeStock = $auth->createPermission('removeStock');
        $removeStock->description = 'Remove Stock';
        $auth->add($removeStock);

        //PRODUTO

        $createProduct = $auth->createPermission('createProduct');
        $createProduct->description = 'Create a Product';
        $auth->add($createProduct);

        $editProduct = $auth->createPermission('editProduct');
        $editProduct->description = 'Edit a Product';
        $auth->add($editProduct);

        $deleteProduct = $auth->createPermission('deleteProduct');
        $deleteProduct->description = 'Delete a Product';
        $auth->add($deleteProduct);

        $viewProducts = $auth->createPermission('viewProducts');
        $viewProducts->description = 'View all Products in back office';
        $auth->add($viewProducts);

        $viewAllOrders = $auth->createPermission('viewAllOrders');
        $viewAllOrders->description = 'View all orders history';
        $auth->add($viewAllOrders);

        $addEmploye = $auth->createPermission('addEmploye');
        $addEmploye->description = 'Add an employe';
        $auth->add($addEmploye);

        $deleteUser = $auth->createPermission('deleteUser');
        $deleteUser->description = 'Delete a user';
        $auth->add($deleteUser);

        $editUser = $auth->createPermission('editUser');
        $editUser->description = 'Edit employes and clients data';
        $auth->add($editUser);

        $editOrderStatus = $auth->createPermission('editOrderStatus');
        $editOrderStatus->description = 'Edit order status';
        $auth->add($editOrderStatus);

        $viewProductDetails = $auth->createPermission('viewProductDetails');
        $viewProductDetails->description = 'View product details';
        $auth->add($viewProductDetails);

        $addProductToCart = $auth->createPermission('addProductToCart');
        $addProductToCart->description = 'Add a product to the cart';
        $auth->add($addProductToCart);

        $removeProductFromCart = $auth->createPermission('removeProductFromCart');
        $removeProductFromCart->description = 'Remove a product from the cart';
        $auth->add($removeProductFromCart);

        $editProductAmmountInCart = $auth->createPermission('editProductAmmountInCart');
        $editProductAmmountInCart->description = 'Edit the quantity of a product in the cart';
        $auth->add($editProductAmmountInCart);

        $deliverySpot = $auth->createPermission('deliverySpot');
        $deliverySpot->description = "Choose an order's delivery spot";
        $auth->add($deliverySpot);

        $viewOrders = $auth->createPermission('viewOrders');
        $viewOrders->description = "View own orders";
        $auth->add($viewOrders);

        $editOwnData = $auth->createPermission('editOwnData');
        $editOwnData->description = "Edit your own data";
        $auth->add($editOwnData);



        // add "author" role and give this role the "createPost" permission

        $client = $auth->createRole('client');
        $auth->add($client);
        $auth->addChild($client, $viewProductDetails);
        $auth->addChild($client, $addProductToCart);
        $auth->addChild($client, $removeProductFromCart);
        $auth->addChild($client, $editProductAmmountInCart);
        $auth->addChild($client, $deliverySpot);
        $auth->addChild($client, $viewOrders);
        $auth->addChild($client, $editOwnData);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $employee = $auth->createRole('employee');
        $auth->add($employee);
        $auth->addChild($employee, $viewProducts);
        $auth->addChild($employee, $viewAllOrders);
        $auth->addChild($employee, $addStock);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $employee);
        $auth->addChild($admin, $createProduct);
        $auth->addChild($admin, $deleteProduct);
        $auth->addChild($admin, $removeStock);
        $auth->addChild($admin, $addEmploye);
        $auth->addChild($admin, $deleteUser);
        $auth->addChild($admin, $editUser);
        $auth->addChild($admin, $editOrderStatus);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
    }
}