<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /** 
     * Create a new controller instance.
     *
     * @return void
     * 
     **/

    public function __construct()
    {
        $this->middleware('auth');
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     **/
     
    public function index()
    {
        return view('home');
    }

    
	
	// public function userAuthenticate(Request $request){
	// 	\Log::info($request->username);
	// 	\Log::info(request('password'));
	// 	$AuthData=$request->all();



	// 	$lengths = sizeof($this->UserData) ;
    //         for($i = 0;$i<$lengths;$i++){
               
    //            if($this->UserData[$i]['name'] == trim($AuthData['username'])){
                  
    //                 if(trim($this->UserData[$i]['password']) === trim($AuthData['password'])){

	// 				return response()->json(array(
	// 					'code'      =>  200,
	// 					'UserData'   =>  $this->UserData[$i]
	// 				));

    //                 }
    //                 else{

	// 					return response()->json([
	// 						'code'      =>  401,
	// 						'message'   =>  'Password does not match'
	// 					],401);

						
    //                 }
    //            }

    //         }

	// 		return response()->json([
	// 			'code'      =>  401,
	// 			'message'   =>  'User Name does not match'
	// 		],401);

	// }
}
