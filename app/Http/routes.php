<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('services/two-datatables', 'ServiceController@getUsersDataTables');

Route::get('services/two-datatables/posts', 'ServiceController@getPostsDataTables');

Route::controllers([
    'auth'                           => 'Auth\AuthController',
    'password'                       => 'Auth\PasswordController',
    'fluent'                         => 'FluentController',
    'eloquent'                       => 'EloquentController',
    'collection'                     => 'CollectionController',
    'html'                           => 'HtmlBuilderController',
    'sitemap'                        => 'SitemapController',
    'buttons'                        => 'ButtonsController',
    'services'                       => 'ServiceController',
    'relation'                       => 'RelationController',
    'product'                        => 'ProductController',
    'joiningmoneyreceipt'            => 'JoiningmoneyreceiptController',
    'loanapplicationmoneyreceipt'    => 'LoanapplicationmoneyreceiptController',
    'savingsmoneyreceipt'            => 'SavingsmoneyreceiptController',
    'member'                         => 'MemberController',
    'loanapplication'                => 'LoanapplicationController',
    'loan'                           => 'LoanController',
    'saving'                         => 'SavingController',
    'appformandpassbook'             => 'AppformandpassbookController',
    'share'                          => 'ShareController',
    'sharecertificate'               => 'SharecertificateController',
    'saving2'                        => 'Saving2Controller',
    'monthlysaving'                  => 'MonthlysavingController',
    'zone'                           => 'ZoneController',
    'area'                           => 'AreaController',
    'branch'                         => 'BranchController',
    'brn'                            => 'BrnController',
    'division'                       => 'DivisionController',
    'mikrofdivision'                 => 'MikrofdivisionController',
    'thana'                          => 'ThanaController',
    'union'                          => 'UnionController',
    'ward'                           => 'WardController',
    'postoffice'                     => 'PostofficeController',
    'district'                       => 'DistrictController',
    'domain'                         => 'DomainController',
    'year'                           => 'YearController',
    'month'                          => 'MonthController',
    'dpsapplication'                 => 'DpsapplicationController',
    'sale'                           => 'SaleController',
    'purchage'                        => 'PurchageController',
    'branchproduct'                   => 'BranchproductController',
    'product'                         => 'ProductController',
    'category'                        => 'CategoryController',

]); 

Route::resource('users', 'UsersController');

Route::get('getDivisionOffice', 'SelectBoxController@getDivisionOffice');

Route::get('getDivision', 'SelectBoxController@getDivision');

Route::get('getDistrict', 'SelectBoxController@getDistrict');

Route::get('getZone','SelectBoxController@getZone');

Route::get('getArea','SelectBoxController@getArea');

Route::get('getBranch','SelectBoxController@getBranch');

Route::get('getThana','SelectBoxController@getThana');

Route::get('getJustify','SelectBoxController@getJustify');



Route::get('{view}', function ($view) {
    if (view()->exists($view)) {
        return view($view);
    }

    return app()->abort(404, 'Page not found!');
});
