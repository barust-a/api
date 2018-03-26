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
use Illuminate\Support\Facades\Auth;
class AllUserControler extends Controller
{
    function GetAllUsers() {
        $allusers = DB::table('utilisateurs')->get();
        return response()->json($allusers);
    }

    function GetUserId($id) {
        $user = DB::table('utilisateurs')->where('id', $id);
        return response()->json($user);
    }

    function GetUserName($name) {
        $user = DB::table('utilisateurs')->where('name', $name);
        return response()->json($user);
    }
}