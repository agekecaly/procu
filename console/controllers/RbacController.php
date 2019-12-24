<?php 
namespace console\controllers; 

use Yii;
use yii\console\Controller;

class RbacController extends Controller 
{     
	public function actionInit()     
	{         
		$auth = Yii::$app->authManager;
	//	$auth->removeAll(); //remove previous rbac.php files under console/data
	 
	    //CREATE PERMISSIONS	

	    /*************** Assets Permission *************/	
		
		//Permission to create assets
		$createAsset = $auth->createPermission('createSupplier');
        $createAsset->description = 'Create Supplier';
        $auth->add($createSupplier);
	 
		//Permission to edit assets
		$editAsset = $auth->createPermission('editSupplier');
        $editAsset->description = 'Edit Supplier';
        $auth->add($editSupplier);

        //Permission to view asset
        $viewAsset = $auth->createPermission('viewSupplier');
        $viewAsset->description = 'View Supplier';
        $auth->add($viewSupplier);

        //Permission to view asset
        $deleteAsset = $auth->createPermission('deleteSupplier');
        $deleteAsset->description = 'Delete Supplier';
        $auth->add($deleteSupplier);


	 	/************** End of Assets Permission ******/


	 	 /*************** Residents Permission *************/	
        //Permission to create residents
        $createResident = $auth->createPermission('createTender');
        $createResident->description = 'Create Tender';
        $auth->add($createTender);

        //Permission to edit resident
        $editResident = $auth->createPermission('editTender');
        $editResident->description = 'Edit Tender';
        $auth->add($editResidentTender);

        //Permission to view resident
        $viewResident = $auth->createPermission('viewTender');
        $viewResident->description = 'View Tender';
        $auth->add($viewTender);

        //Permission to delete resident
        $deleteResident = $auth->createPermission('deleteResident');
        $deleteResident->description = 'Delete Asset';
        $auth->add($deleteResident);

        /************** End of Residents Permission ******/

        /*************** Report Permissions **************/
        //Permission to create report
        $createReport = $auth->createPermission('createReport');
        $createReport->description = 'Create Report';
        $auth->add($createReport);

        //Permission to view report
        $viewReport = $auth->createPermission('viewReport');
        $viewReport->description = 'Edit Report';
        $auth->add($viewReport);

        /*************** End of Report Permissions **************/

        /*************** Payment Permissions **************/
        //Permission to make Payment
        $makePayment = $auth->createPermission('makePayment');
        $makePayment->description = 'Make Payment';
        $auth->add($makePayment);

        //Permission to view Payment
        $viewPayment = $auth->createPermission('viewPayment');
        $viewPayment->description = 'View Payment';
        $auth->add($viewPayment);

        /*************** End of Payment Permissions **************/

        //Permission to view all dasboard
        $viewDashboards = $auth->createPermission('viewDashboards');
        $viewDashboards->description = 'View Dashboards';
        $auth->add($viewDashboards);

        //Permission to create user profiles such as board, executive, and admin
        $createUserProfile = $auth->createPermission('createProfile');
        $createUserProfile->description = 'Create User Profile';
        $auth->add($createUserProfile);

        $viewUserProfile = $auth->createPermission('viewProfile');
        $viewUserProfile->description = 'View User Profile';
        $auth->add($viewUserProfile);


        //ROLES
        $dataEntry = $auth->createRole('dataEntry');  //Data Entry role
        $auth->add($dataEntry);
        $auth->addChild($dataEntry, $createAsset);
        $auth->addChild($dataEntry, $editAsset);
        $auth->addChild($dataEntry, $createResident);
        $auth->addChild($dataEntry, $editResident);


        $resident = $auth->createRole('resident'); // Resident role
        $auth->add($resident);
        $auth->addChild($resident, $makePayment);
        $auth->addChild($resident, $viewPayment);


        $boardOfInland = $auth->createRole('board'); // Board of Inland Revenue role
        $auth->add($boardOfInland);
        $auth->addChild($boardOfInland, $dataEntry);
        $auth->addChild($boardOfInland, $resident);
        $auth->addChild($boardOfInland, $viewAsset);
        $auth->addChild($boardOfInland, $deleteAsset);
        $auth->addChild($boardOfInland, $deleteResident);
        $auth->addChild($boardOfInland, $createReport);
        $auth->addChild($boardOfInland, $viewReport);

        $executiveMgmt = $auth->createRole('executive'); // Executive Management role
        $auth->add($executiveMgmt);
		$auth->addChild($executiveMgmt, $boardOfInland);
		$auth->addChild($executiveMgmt, $viewDashboards);

		$admin = $auth->createRole('admin');
		$auth->add($admin);
		$auth->addChild($admin, $executiveMgmt);
        $auth->addChild($admin, $viewUserProfile);
		$auth->addChild($admin, $createUserProfile);


		$auth->assign($admin, 1);

    }
}