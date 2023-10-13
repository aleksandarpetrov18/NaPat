<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\RolesId;
use App\Models\Roles;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TestController extends Controller
{
    public function getDate(int $id)
    {
        //Carbon::parse($value)->format('Y-m-d H:i:s');
        $user = User::where('id',$id)
            ->first();
            if(!$user) {
                return response()->json("ne postoe", 404);
            }
        $roleid = RolesId::where('user_id', $id)
            ->select('role_id')->first()->toArray();
        if($roleid != 2) {
            return response()->json("Nema za tebe", 403);
        }
            return response()->json($user, 200);
    }
}


