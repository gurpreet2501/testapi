<?php
use App\Factory\Response as Resp;
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

   $pag_no = isset($request->data['page']) ? $request->data['page'] : 1;
   
   $class = 'App\\REST\\'.ucfirst($obj).'\\'.ucfirst($api);

   if(!class_exists($class))
       return Resp::errors(0);
   
   $t = new $class();
   
   if(!method_exists($t, 'regular'))
   	 return Resp::errors(0);
   	 
   	
   // $page_no = isset($request->data['page']) ? $request->data['page'] : '';
   
   $result =  $t->regular($request);

   if($result['STATUS'] == 'SUCCESS')
      return Resp::success(response()->json($result));
   else
      return Resp::errors(response()->json($result));

});