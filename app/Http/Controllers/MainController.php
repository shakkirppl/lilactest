<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Designation;
use App\Models\User;
class MainController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function searchdetail(Request $request){
        $key=$request->key;

$n=strlen($key);
   
if($n>=1){

            $detaildata = User::join('departments','departments.id','=','users.Fk_department')->join('designations','designations.id','=','users.Fk_designation')
                 ->select('users.*','departments.name as departments','designations.name as designations')

                ->where('users.Name','like','%'.$key.'%')
                ->orwhere('designations.Name','like','%'.$key.'%') 
                ->orwhere('departments.Name','like','%'.$key.'%') 
                ->get();
}
else{
    $detaildata = User::join('departments','departments.id','=','users.Fk_department')->join('designations','designations.id','=','users.Fk_designation')
    ->select('users.*','departments.name as departments','designations.name as designations')

   ->get(); 
}
                $html="";

  foreach ($detaildata as $detail) {

    $html.='<div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                               
                                <div class="ml-4 text-lg leading-7 font-semibold"><span class="text-gray-900 dark:text-white">'.$detail->Name.'</span></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    '.$detail->designations.'<br>'.$detail->departments.'

                                </div>
                            </div>
                        </div>

              


                    </div>
                </div>';
  }
         echo $html;     
            

    }
}
