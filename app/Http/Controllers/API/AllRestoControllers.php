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

class AllRestoControllers extends Controller
{
    function GetAllResto() {
        $allresto = DB::table('restaurants')->get();
        return response()->json($allresto);
    }

    function GetRestoId($id) {
        $resto = DB::table('restaurants')->where('id', $id);
        return response()->json($resto);
    }

    function GetRestoName($name) {
        $resto = DB::table('restaurants')->where('name', $name);
        return response()->json($resto);
    }

    function NewResto(Request $request) {

        $input = $request->all();
        $resto = restaurants::create($input);
    }

    function DeleteResto(Request $id) {
       // $resto = DB::table('restaurants')->where('id', $id->id)->delete();
        $resto = restaurants::where('id', $id->id)->delete();
        return response()->json($resto);

    }

    function UpdateResto($id, Request $request) {
        $resto = restaurants::where('id', $id)->update(['']);
    }
}