
<?php
/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 26/03/18
 * Time: 10:11
 */

namespace App\Http\Controllers;
use Couchbase\Document;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    function GetAllMenu()
    {
        $allmenus = DB::table('menus')->get();
        return response()->json($allmenus);
    }

    function GetMenu($id)
    {
        $user = DB::table('menus')->where('id', $id)->get();
        return response()->json($user);
    }

    function GetRestoMenu($id)
    {
        $user = DB::table('menus')->where('id_resto', $id)->get();
        return response()->json($user);
    }

    function DeleteMenu($id) {
        DB::table('menus')->where('id', $id)->delete();
        return response()->json(['success'=> 'deleted'], $this->successStatus);
    }
}