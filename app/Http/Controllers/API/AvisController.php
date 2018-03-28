<?php
/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 26/03/18
 * Time: 12:44
 */

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\restaurants;
use Couchbase\Document;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;

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
        $avis = DB::table('comments')->where('id_comment', $id)->delete();
        return response()->json($avis);
    }

    function GetRestoUserAvis($id_user, $id_resto) {
        $user = DB::table('comments')->where('id_user', $id_user)->where('id_resto', $id_resto)->get();
        return response()->json($user);
    }

    function PostAvis(Request $req, $id_resto) {

        $validator = Validator::make($req->all(), [
            'comment' => 'required',
            'rate' => 'required|between:0,5'
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        if (Auth::check()) {
            $userId = Auth::id();
            $averageRate = DB::table('comments')->where('id_resto', $id_resto)->avg('rate');
            $comment = DB::table('comments')->insert(['id_user' => $userId, 'id_resto' => $id_resto,
                'comment' => $req->comment, 'rate' => $req->rate]);

            DB::table('restaurants')->where('id', $id_resto)->update(['rate' => $averageRate]);
            return response()->json($comment);
        }
        else
            echo "connectez vous";

    }
}