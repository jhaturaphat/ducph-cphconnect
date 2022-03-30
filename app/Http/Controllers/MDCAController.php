<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MDCAController extends Controller
{
    function index(){
        $result = DB::connection('mysql_hos')->select();
    }
}
