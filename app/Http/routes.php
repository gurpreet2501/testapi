<?php
use App\Models\Dggsjm_posts;
use App\Models\Dggsjm_categories;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::post('v2/{obj}/{api}', function (Request $request, $obj, $api) {

   
   $class = 'App\\REST\\'.ucfirst($obj).'\\'.ucfirst($api);

   if(!class_exists($class))
   	 return response()->json(['Status' => 'Failure']);
   
   $t = new $class();
   
   if(!method_exists($t, 'regular'))
   	 return response()->json(['Status' => 'Failure']);
   	
   $page_no = isset($request->data['page']) ? $request->data['page'] : '';
   
   $result =  $t->regular();	
   echo "<pre>";
   print_r($result);
   exit;
   exit;	
   
});