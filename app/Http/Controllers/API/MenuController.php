<?php
/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 26/03/18
 * Time: 10:11
 */

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Menu;
use App\restaurants;
use Couchbase\Document;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
        $user = DB::table('menus')->where('resto_id', $id)->get();
        return response()->json($user);
    }

    function DeleteMenu($id) {
        $deleted = DB::table('menus')->where('id', $id)->delete();
        return response()->json($deleted);
    }

    function NewMenu(Request $request) {
        $validator = Validator::make($request->all(), [
            'resto_id' => 'required|integer',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();
        $menu = Menu::create($input);
        return response()->json($menu);
    }

    function updateMenu(Request $request, $id)
    {
        $all = $request->all();
        $menu = DB::table('menus')->where('id', $id)->update($all);
        return response()->json($menu);
    }
}