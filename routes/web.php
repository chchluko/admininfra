<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/


Route::get('/tareas', 'TaskController@index');
Route::put('/tareas/actualizar', 'TaskController@update');
Route::post('/tareas/guardar', 'TaskController@store');
Route::delete('/tareas/borrar/{id}', 'TaskController@destroy');
Route::get('/tareas/buscar', 'TaskController@show');


/*Route::get('adminlte/', function () {
    return view('adminlte');
});*/

/*Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');*/

Route::get('notes', 'NotesController@index');
Route::get('notes/{id}/destroy', 'NotesController@destroy')->name('notes.destroy');

Auth::routes();

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('emails', EmailController::class)->middleware('auth');
Route::get('searchemail', 'EmailController@searchEmail')->name('buscarmail')->middleware('auth');
Route::resource('trackingemails', TrackingEmailController::class)->middleware('auth');
Route::resource('cat_emails', EmailTypeController::class)->middleware('auth');
Route::get('searchtrackingemail', 'TrackingEmailController@searchTrackingEmail')->name('auditaremail')->middleware('auth');
Route::get('reporttrackingemailbyuser/{user}', 'TrackingEmailController@reportTrackingByUser')->name('trackingreport')->middleware('auth');
Route::get('reporttrackingemail/{email}', 'TrackingEmailController@reportTrackingEmailByEmail')->name('trackingreportemail')->middleware('auth');

Route::get('emails/{email}/destroy', '\App\Http\Controllers\EmailController@down')->name('emails.down');
Route::put('emails/{email}/destroy', 'EmailController@downupdate')->name('emails.downupdate');

Route::resource('empleados', EmpleadoController::class)->middleware('auth');
Route::get('searchempleado', 'EmpleadoController@searchEmpleado')->name('buscarempleado')->middleware('auth');

Route::resource('ubicaciones', UbicacionController::class)->middleware('auth');

Route::resource('clavestelefonicas', PhoneKeyController::class)->middleware('auth');
Route::resource('asignacionclaves', AssignedPhoneKeyController::class)->middleware('auth');
Route::get('searchclaveasig', 'AssignedPhoneKeyController@searchAssignedKey')->name('buscarclaveasignada')->middleware('auth');
Route::get('asignacionclaves/{asignacionclafe}/responsiva', 'AssignedPhoneKeyController@responsiva')->name('responsiva_key')->middleware('auth');

Route::resource('enlacesprovedores', LinkProviderController::class)->middleware('auth');
Route::resource('enlacestipos', LinkTypeController::class)->middleware('auth');
Route::resource('enlacesstatus', LinkStatusController::class)->middleware('auth');
Route::resource('enlaces', LinkController::class)->middleware('auth');
Route::get('searchenlace', 'LinkController@searchLink')->name('buscarlink')->middleware('auth');

Route::resource('extensionestipo', ExtensionTypeController::class)->middleware('auth');
Route::resource('extensiones', ExtensionController::class)->middleware('auth');
Route::get('searchextension', 'ExtensionController@searchExtension')->name('buscarextension')->middleware('auth');

Route::resource('plataformastipo', PlatformTypeController::class)->middleware('auth');
Route::resource('plataformasstatus', PlatformStatusController::class)->middleware('auth');
Route::resource('plataformasprovedor', PlatformProviderController::class)->middleware('auth');
Route::resource('plataformasmarca', PlatformMarkController::class)->middleware('auth');
Route::resource('servidores', ServerController::class)->middleware('auth');
Route::resource('switchs', SwichController::class)->middleware('auth');
Route::resource('routers', RouterController::class)->middleware('auth');
Route::resource('biometricos', BiometricController::class)->middleware('auth');
Route::resource('cctv', CctvController::class)->middleware('auth');
Route::resource('doblea', DobleaController::class)->middleware('auth');
Route::resource('screens', ScreenController::class)->middleware('auth');
Route::resource('firewalls', FirewallController::class)->middleware('auth');
Route::resource('operatings', OperatingSystemController::class)->middleware('auth');
Route::resource('datacenters', DatacenterController::class)->middleware('auth');
Route::get('searchplataforma', 'PlatformController@searchPlatform')->name('buscarplataforma')->middleware('auth');

Route::resource('soportetipo', SupportTypeController::class)->middleware('auth');
Route::resource('soportestatus', SupportStatusController::class)->middleware('auth');
Route::resource('soporteprovedor', SupportProviderController::class)->middleware('auth');
Route::resource('soporteowner', SupportOwnerController::class)->middleware('auth');
Route::resource('soportemarca', SupportMarkController::class)->middleware('auth');
Route::resource('soporte', SupportController::class)->middleware('auth');
Route::resource('asignacionsoporte', AssignedSupportController::class)->middleware('auth');
Route::get('searchsupport', 'SupportController@searchSupport')->name('buscarsupport')->middleware('auth');
Route::get('searchsupportasig', 'AssignedSupportController@searchAssignedSupport')->name('buscarsupportasig')->middleware('auth');
Route::get('resposivasoporte/{asignacionsoporte}', 'AssignedSupportController@responsiva')->name('responsiva_soporte')->middleware('auth');

Route::resource('moviltipo', MovilTypeController::class)->middleware('auth');
Route::resource('movilstatus', MovilStatusController::class)->middleware('auth');
Route::resource('movilplan', MovilPlanController::class)->middleware('auth');
Route::resource('movilmarca', MovilMarkController::class)->middleware('auth');
Route::resource('movil', MovilController::class)->middleware('auth');
Route::resource('tablet', TabletController::class)->middleware('auth');
Route::resource('asignacionmovil', AssignedMovilController::class)->middleware('auth');
Route::resource('plantipo', PlanTypeController::class)->middleware('auth');
Route::resource('warehouse', WarehouseController::class)->middleware('auth');
Route::get('searchmovilasig', 'AssignedMovilController@searchAssignedMovil')->name('buscarmovilasig')->middleware('auth');
Route::get('searchmovil', 'MovilController@searchMovil')->name('buscarmovil')->middleware('auth');
Route::get('searchplan', 'MovilPlanController@searchPlan')->name('buscarplan')->middleware('auth');
Route::get('resposivamovil/{asignacionmovil}', 'AssignedMovilController@responsiva')->name('responsiva_movil')->middleware('auth');
Route::get('liberacionmovil/{asignacionmovil}', 'AssignedMovilController@liberacion')->name('liberacion_movil')->middleware('auth');
Route::get('reportassignedmovil', 'AssignedMovilController@reportAssignedMovils')->name('assignedmovilreport')->middleware('auth');

Route::name('admin')->resource('roles', Admin\RoleController::class)->names('roles');
Route::name('admin')->resource('users', Admin\UserController::class)->only('index','edit','update')->names('users');

