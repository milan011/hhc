<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

/*Route::middleware('jwt.auth')->get('/user', function (Request $request) {
return $request->user();
});*/

Route::group([
    'middleware' => ['jwt.auth'],
    'namespace'  => 'Api',
], function () {
    // User
    Route::get('getUserInfo', 'UserController@getUser');
    Route::get('userAll', 'UserController@userAll');
    Route::post('userLogout', 'UserController@logout');
    Route::get('userList', 'UserController@index');
    Route::post('user', 'UserController@store');
    Route::post('passReset', 'UserController@passReset');
    Route::put('user/{id}', 'UserController@update');
    Route::get('user/{user}/roles', 'UserController@getUserRoles');
    Route::post('giveUser/{user}/roles', 'UserController@giveUserRoles');
    Route::delete('user/{id}', 'UserController@destroy');
    Route::post('resetPassword', 'UserController@resetPassword');

    //Permission
    Route::get('permissionList', 'PermissionController@index');
    Route::get('permissionAll', 'PermissionController@permissionAll'); //所有权限列表,无分页
    Route::post('permission', 'PermissionController@store');
    Route::put('permission/{id}', 'PermissionController@update');
    Route::delete('permission/{id}', 'PermissionController@destroy');

    //Role
    Route::get('roleList', 'RoleController@index');
    Route::get('allRolesList', 'RoleController@allRoles');
    Route::post('role', 'RoleController@store');
    Route::put('role/{id}', 'RoleController@update');
    Route::delete('role/{id}', 'RoleController@destroy');
    Route::get('role/{role}/permissions', 'RoleController@getRolePermissions');
    Route::post('giveRole/{role}/permissions', 'RoleController@giveRolePermissions');

    //Car
    Route::get('carList', 'CarController@index'); //车源列表
    Route::get('getCarInfo/{id}', 'CarController@getCar'); //车源详情
    Route::post('carInfoAdd', 'CarController@storeInfo'); //车源信息添加
    Route::post('carImageAdd', 'CarController@storeImage'); //车源图片添加
    Route::put('carInfoUpdate/{id}', 'CarController@updateInfo'); //车源信息修改
    Route::delete('carImageDelete/{id}', 'CarController@deleteImage'); //车源图片修改
    Route::get('carSaleOrUnsale/{id}', 'CarController@SaleOrUnsale'); //车源上/下架
    Route::post('carTouch', 'CarController@carTouch'); //快速跟进
    Route::post('carFollow/{id}', 'CarController@carFollow'); //车源跟踪
    Route::post('carTrans/{id}', 'CarController@carTrans'); //发起交易
    Route::post('carPingGu/{id}', 'CarController@carPingGu'); //车源评估

    //Want
    Route::get('wantList', 'WantController@index'); //求购列表
    Route::get('getWantInfo/{id}', 'WantController@show'); //求购详情
    Route::post('wantInfoAdd', 'WantController@store'); //求购信息添加
    Route::put('wantInfoUpdate/{id}', 'WantController@update'); //求购信息修改
    Route::get('wantSaleOrUnsale/{id}', 'WantController@SaleOrUnsale'); //求购上/下架
    Route::post('wantTouch', 'WantController@wantTouch'); //快速跟进
    Route::post('wantFollow/{id}', 'WantController@wantFollow'); //求购跟踪
    Route::post('wantTrans/{id}', 'WantController@wantTrans'); //发起交易

    //Customer
    Route::get('customerList', 'CustomerController@index'); //客户列表
    Route::get('getCustomerInfo/{id}', 'CustomerController@show'); //客户详情
    Route::post('customerAdd', 'CustomerController@store'); //客户信息添加
    Route::put('customerUpdate/{id}', 'CustomerController@update'); //客户信息修改

    //Shop
    Route::get('shopList', 'ShopController@index');
    Route::get('shopAll', 'ShopController@shopAll'); //所有门店列表,无分页
    Route::post('shop', 'ShopController@store');
    Route::get('getShopInfo/{id}', 'ShopController@getInfo');
    Route::put('shop/{id}', 'ShopController@update');
    Route::delete('shop/{id}', 'ShopController@destroy');

    //Opportunity
    Route::get('opportunityList', 'OpportunityController@index');
    Route::post('opportunity', 'OpportunityController@store');
    Route::get('getOpportunity/{id}', 'OpportunityController@show');
    Route::put('opportunity/{id}', 'OpportunityController@update');
    Route::post('opportunityAssign/{id}', 'OpportunityController@assign');
    Route::delete('opportunity/{id}', 'OpportunityController@destroy');

    //Transaction
    Route::get('transactionList', 'TranscationController@index');
    Route::post('transaction', 'TranscationController@store');
    Route::get('getTransaction/{id}', 'TranscationController@show');
    Route::put('transaction/{id}', 'TranscationController@update');
    Route::delete('transaction/{id}', 'TranscationController@destroy');

    //Loan
    Route::get('loanList', 'LoanController@index');
    Route::post('loan', 'LoanController@store');
    Route::get('getLoan/{id}', 'LoanController@show');
    Route::put('loan/{id}', 'LoanController@update');
    Route::delete('loan/{id}', 'LoanController@destroy');

    //Notice
    Route::get('noticeList', 'NoticeController@index');
    Route::get('noticeAll', 'NoticeController@noticeAll'); //所有公告列表,无分页
    Route::post('notice', 'NoticeController@store');
    Route::get('getNotice/{id}', 'NoticeController@show');
    Route::put('notice/{id}', 'NoticeController@update');
    Route::delete('notice/{id}', 'NoticeController@destroy');

    //Service
    Route::get('serviceList', 'ServiceController@index');
    Route::get('serviceAll', 'ServiceController@serviceAll');
    Route::post('service', 'ServiceController@store');
    Route::get('getServiceInfo/{id}', 'ServiceController@getInfo');
    Route::put('service/{id}', 'ServiceController@update');
    Route::delete('service/{id}', 'ServiceController@destroy');

    //ServiceDetail
    Route::get('serviceDetailList', 'ServiceDetailController@index');
    Route::post('serviceDetail', 'ServiceDetailController@store');
    Route::get('getServiceDetail/{id}', 'ServiceDetailController@getInfo');
    Route::put('serviceDetail/{id}', 'ServiceDetailController@update');
    Route::delete('serviceDetail/{id}', 'ServiceDetailController@destroy');

    //Inventory
    Route::get('inventoryList', 'InventoryController@index');
    Route::post('inventory', 'InventoryController@store');
    Route::get('getInventoryInfo/{id}', 'InventoryController@getInfo');
    Route::put('inventory/{id}', 'InventoryController@update');
    Route::delete('inventory/{id}', 'InventoryController@destroy');

    //InventoryDetail
    Route::get('inventoryDetailList', 'InventoryDetailController@index');
    Route::post('inventoryDetail', 'InventoryDetailController@store');
    Route::get('getInventoryDetailInfo/{id}', 'InventoryDetailController@getInfo');
    Route::put('inventoryDetail/{id}', 'InventoryDetailController@update');
    Route::delete('inventoryDetail/{id}', 'InventoryDetailController@destroy');

    //Manager
    Route::get('managerList', 'ManagerController@index');
    Route::get('managerAll', 'ManagerController@managerAll'); //所有权限列表,无分页
    Route::post('manager', 'ManagerController@store');
    Route::put('manager/{id}', 'ManagerController@update');
    Route::delete('manager/{id}', 'ManagerController@destroy');

    //Package
    Route::get('packageList', 'PackageController@index');
    Route::get('packageAll', 'PackageController@packageAll'); //所有套餐列表,无分页
    Route::post('package', 'PackageController@store');
    Route::get('getPackage/{id}', 'PackageController@getPackage');
    Route::put('package/{id}', 'PackageController@update');
    Route::delete('package/{id}', 'PackageController@destroy');

    //InfoSelf
    Route::get('infoSelfList', 'InfoSelfController@index');
    Route::post('infoSelf', 'InfoSelfController@store');
    Route::get('getInfo/{id}', 'InfoSelfController@getInfo');
    Route::put('infoSelf/{id}', 'InfoSelfController@update');
    Route::delete('infoSelf/{id}', 'InfoSelfController@destroy');
    Route::match(['get', 'post'], 'infoStatistics', 'InfoSelfController@statistics');

    //InfoDianxin
    Route::get('infoDianxinList', 'InfoDianxinController@index');
    // Route::get('infoDianxinAll', 'InfoDianxinController@infoDianxinAll'); //所有信息列表,无分页
    Route::post('infoDianxin', 'InfoDianxinController@store');
    Route::post('importInfoDianxin', 'InfoDianxinController@importInfo');
    Route::get('infoDianxin/exampleExcelDownload', 'InfoDianxinController@exampleExcelDownload');
    // Route::post('infoDianxin/dealWith', 'InfoDianxinController@dealWith')->middleware('throttle:20');
    Route::get('infoDianxin/dealWith', 'InfoDianxinController@dealWith');
    Route::put('infoDianxin/{id}', 'InfoDianxinController@update');
    Route::delete('infoDianxin/{id}', 'InfoDianxinController@destroy');

    Route::get('infoDianxin/chormeBroswerDown', 'InfoDianxinController@chormeBroswerDown');
    /*
    Route::get('all_roles', 'RolesController@allRoles');
    Route::delete('roles/{role}', 'RolesController@destroy');*/
    /*
Route::post('car', 'CarController@store');
Route::get('user/{id}/edit', 'UserController@edit');
Route::put('user/{id}', 'UserController@update');
Route::delete('user/{id}', 'UserController@destroy');
Route::post('/user/{id}/status', 'UserController@status');

// Article
Route::get('article', 'ArticleController@index')->name('api.article.index')->middleware(['permission:list_article']);
Route::post('article', 'ArticleController@store')->name('api.article.store')->middleware(['permission:create_article']);
Route::get('article/{id}/edit', 'ArticleController@edit')->name('api.article.edit')->middleware(['permission:update_article']);
Route::put('article/{id}', 'ArticleController@update')->name('api.article.update')->middleware(['permission:update_article']);
Route::delete('article/{id}', 'ArticleController@destroy')->name('api.article.destroy')->middleware(['permission:destroy_article']);*/

});

/*Route::group([
'namespace' => 'Api',
], function () {
// File Upload
Route::post('file/upload', 'UploadController@fileUpload')->middleware('auth:api');
// Edit Avatar
Route::post('crop/avatar', 'UserController@cropAvatar')->middleware('auth:api');

// Comment
Route::get('commentable/{commentableId}/comment', 'CommentController@show')->middleware('api');
Route::post('comments', 'CommentController@store')->middleware('auth:api');
Route::delete('comments/{id}', 'CommentController@destroy')->middleware('auth:api');
Route::post('comments/vote/{type}', 'MeController@postVoteComment')->middleware('auth:api');
Route::get('tags', 'TagController@getList');
});*/

Route::group(['middleware' => 'jwt.auth', 'namespace' => 'Auth'], function () {
    Route::get('auth/getUser', 'LoginController@getUser');
});
Route::group(['middleware' => 'jwt.refresh'], function () {
    Route::get('auth/userRefresh', 'LoginController@userRefresh');
});
