<?php
/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 26/03/18
 * Time: 12:44
 */

namespace App\Http\Controllers\API;
use App\restaurants;
use Couchbase\Document;
use Illuminate\Support\Facades\DB;

class AvisController
{
    function GetAllAvis()
    {
        $allmenus = DB::table('comments')->get();
        return response()->json($allmenus);
    }

    function GetAvis($id)
    {
        $user = DB::table('comments')->where('id_comment', $id)->get();
        return response()->json($user);
    }

    function GetRestoAvis($id)
    {
        $user = DB::table('comments')->where('id_resto', $id)->get();
        return response()->json($user);
    }

    function GetUserAvis($id)
    {
        $user = DB::table('comments')->where('id_user', $id)->get();
        return response()->json($user);
    }

    function DeleteAvis($id) {
        DB::table('comments')->where('id', $id)->delete();
        return response()->json(['success'=> 'deleted'], $this->successStatus);
    }

    function GetRestoUserAvis($id_user, $id_resto) {
        $user = DB::table('comments')->where('id_user', $id_user)->where('id_resto', $id_resto)->get();
        return response()->json($user);
    }

    function PostAvis(Request $req, $id_resto) {
        if (Auth::check()) {
            $userId = Auth::id();
        }
        $comment = comments::create(['id_user' => $userId, 'id_resto' => $id_resto,
            'comment' => $req->comment, 'rate' => $req->rate]);
        return response()->json($comment);

    }
}