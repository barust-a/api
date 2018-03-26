<?php
/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 26/03/18
 * Time: 12:44
 */

namespace App\Http\Controllers;
use Couchbase\Document;
use Illuminate\Support\Facades\DB;

class AvisController
{
    function GetAllAvis()
    {
        $allmenus = DB::table('avis')->get();
        return response()->json($allmenus);
    }

    function GetAvis($id)
    {
        $user = DB::table('avis')->where('id', $id)->get();
        return response()->json($user);
    }

    function GetRestoAvis($id)
    {
        $user = DB::table('avis')->where('id_resto', $id)->get();
        return response()->json($user);
    }

    function GetUserAvis($id)
    {
        $user = DB::table('avis')->where('id_user', $id)->get();
        return response()->json($user);
    }

    function DeleteAvis($id) {
        DB::table('avis')->where('id', $id)->delete();
        return response()->json(['success'=> 'deleted'], $this->successStatus);
    }

    function GetRestoUserAvis($id_user, $id_resto) {
        $user = DB::table('avis')->where('id_user', $id_user)->where('id_resto', $id_resto)->get();
        return response()->json($user);
    }
}