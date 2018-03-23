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
        $allusers = DB::table('restaurants')->get();
        return response()->json($allusers);
    }
}