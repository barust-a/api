<?php
/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 26/03/18
 * Time: 10:11
 */

namespace App\Http\Controllers;


class MenuController
{
    function GetAllMenu()
    {
        $allmenus = DB::table('menus')->get();
        return response()->json($allmenus);
    }

    function GetMenu($id)
    {
        $user = DB::table('menus')->where('id', $id);
        return response()->json($user);
    }

    function GetRestoMenu($id)
    {
        $user = DB::table('menus')->where('id_resto', $id);
        return response()->json($user);
    }
}