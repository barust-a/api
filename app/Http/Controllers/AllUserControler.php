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
        $allusers = DB::table('users')->get();
        return response()->json($allusers);
    }

    function GetUserId($id) {
        $user = DB::table('users')->where('id', $id);
        return response()->json($user);
    }

    function GetUserName($name) {
        $user = DB::table('users')->where('name', $name);
        return response()->json($user);
    }
}