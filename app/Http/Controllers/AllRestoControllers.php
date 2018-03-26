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

    function DeleteResto($id)
    {
        DB::table('restaurants')->where('id', $id)->delete();
        return response()->json(['success'=> 'deleted'], $this->successStatus);
    }
}