<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 21/03/18
 * Time: 14:08
 */

namespace App\Http\Controllers;
use Couchbase\Document;
use Illuminate\Support\Facades\DB;

class AllUserControler extends Controller
{
    function GetAllUsers() {

        $allusers = DB::table('users')->get();
        return response()->json($allusers);
    }
}