<?php
/**
 * Created by PhpStorm.
 * User: paul
 * Date: 22/03/18
 * Time: 14:33
 */

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\restaurants;
use Couchbase\Document;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Validator;

class AllRestoControllers extends Controller
{
    private $successStatus = 200;

    function GetAllResto()
    {
            $allresto = DB::table('restaurants')->get();
            return response()->json($allresto);
    }

    function GetRestoId($id)
    {
            $resto = DB::table('restaurants')->where('id', $id)->get();
            return response()->json($resto);
    }

    function GetRestoName($name)
    {
            $resto = DB::table('restaurants')->where('nom', $name)->get();
            return response()->json($resto);
    }

    function NewResto(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'phone' => 'required|digits:10',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();
        $resto = restaurants::create($input);
        return response()->json($resto);
    }

    function DeleteResto(Request $id) {
        $resto = restaurants::where('id', $id->id)->delete();
        return response()->json($resto);

    }

    function updateResto(Request $request, $id)
    {
        $all = $request->all();
        $article = DB::table('restaurants')->where('id', $id)->update($all);
        return response()->json(['success'=> $article], $this->successStatus);
    }
}