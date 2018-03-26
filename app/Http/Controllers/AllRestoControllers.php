<?php
/**
 * Created by PhpStorm.
 * User: paul
 * Date: 22/03/18
 * Time: 14:33
 */

namespace App\Http\Controllers;
use Couchbase\Document;
use Illuminate\Support\Facades\DB;

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

    function DeleteResto($id) {
            DB::table('restaurants')->where('id', $id)->delete();
    }

    function PostResto(){

    }
}