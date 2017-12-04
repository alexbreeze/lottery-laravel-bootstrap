<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Award;
use App\Models\Recode;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    // variable award`s code
    protected static $awards = [
        1 => [1, 2],
        2 => [3, 4, 5, 6],
        3 => [7, 8, 9, 10, 11],
        4 => [12, 13, 14, 15, 16, 17],
        5 => [18, 19, 20, 21, 22, 23, 24],
        6 => [25, 26, 27, 28, 29, 30, 31, 32],
        7 => [33, 34, 35, 36, 37, 38, 39, 40, 41],
    ];

    public function __construct()
    {
        // if (isset(session('already'))) {
        //     foreach (self::$awards as $key => $value) {
        //         foreach ($value as $key1 => $value1) {
        //             foreach (session('already') as $value2) {
        //                 if ($value1 == $value2) {
        //                     unset(self::$awards[$key][$key1]);
        //                 }
        //             }
        //         }
        //     }
        // }
    }

    // function for '/index'
    public function index()
    {
        return view('index');
    }

    // function for '/recode'
    public function recode()
    {
        $recodes = Recode::all();
        return view('recode', compact('recodes'));
    }

    // function to get award`s code
    protected static function getCode(bool $isGuest = false)
    {
        if (count(session('already')) >= 5) {
            session(['already' => null]);
            return 0;
        } else {
            $temp    = [];
            $already = session('already') == null ? $temp : session('already');

            if ($isGuest) {
                $tmp = random_int(42, 200);
            } else {
                $tmp = random_int(1, 5);
            }

            foreach ($already as $value) {
                if ($tmp == $value) {
                    return self::getCode($isGuest);
                }
            }

            $already[] = $tmp;
            unset($temp);
            session(['already' => $already]);
            return $tmp;
        }
    }

    // function to get award
    public function getAward(string $name, Request $req)
    {
        $tmp_ip     = $req->ip();
        $tmp_recode = new Recode;
        $tmp_name   = urldecode($name);
        $tmp_user   = User::where('username', '=', $tmp_name)->first();

        if (!empty($tmp_user)) {
            $tmp_id = self::getCode(false);
        } else {
            $tmp_id   = self::getCode(true);
            $tmp_user = User::create(['username' => $tmp_name]);
        }

        // get award
        $tmp_award = null;
        if ($tmp_id != 0) {
            foreach (self::$awards as $key => $value) {
                foreach ($value as $key1 => $value1) {
                    if ($value1 == $tmp_id) {
                        $tmp_award = Award::find($key);
                    }
                }
            }
        }

        if (!empty($tmp_award) && $tmp_award->status != 1) {
            $tmp_awardname     = $tmp_award->awardname;
            $tmp_award->status = 1;
            $tmp_award->save();
            $tmp_recode->award_id = $tmp_award->id;

        } else {
            $tmp_awardname        = '谢谢参与';
            $tmp_recode->award_id = 8;
        }
        
        $tmp_recode->user_id   = $tmp_user->id;
        $tmp_recode->access_ip = $tmp_ip;
        $tmp_recode->save();
        $tmp_count       = $tmp_user->count;
        $tmp_array       = ['count' => $tmp_count, 'awardname' => $tmp_awardname, 'time' => $tmp_recode->created_at];
        $tmp_user->count = $tmp_count == 0 ? 0 : $tmp_count - 1;
        $tmp_user->save();
        return response()->json($tmp_array, 200);
    }

    // function to get user`s count
    public function getCount(string $name)
    {
        $tmp_name  = urldecode($name);
        $tmp_user  = User::where('username', '=', $tmp_name)->first();
        $tmp_array = ['count' => $tmp_user->count];
        return response()->json($tmp_array, 200);
    }
}
