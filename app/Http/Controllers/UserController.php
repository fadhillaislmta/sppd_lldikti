<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Karyawan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function __construct()
    {
       $this->User = new User();  
    }

    public function index()
    {
        $data = [
            'users' => $this->User->allData(),

        ];
        return view('user/index', $data);
    }

}
