<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\HDoctorCert;

class MDCAController extends Controller
{
    /*
    * @return \Illuminate\Http\Request
    */
    public function index($hn='000088973'){

        $model = HDoctorCert::patient($hn);

        $model = DB::connection('mysql_hos')->select("
        SELECT doctor_cert.*, CONCAT(patient.pname, patient.fname, patient.lname) as fullname
        FROM doctor_cert 
        INNER JOIN patient ON doctor_cert.hn = patient.hn
        WHERE doctor_cert.hn = :hn 
        ORDER BY doctor_cert.create_datetime DESC", 
        ['hn'=>$hn]);

        return view('mdca.index',[
            'model'=>$model,
            'moduletitle'=>'ใบรับรองแพทย์',
            'view_menu'=>'anable'
        ]);
    }


    /*
    * @return \Illuminate\Http\Request
    */
    public function show($vn = ''){
        $model = DB::connection('mysql_hos')->select("
        SELECT doctor_cert.*, CONCAT(patient.pname, patient.fname, patient.lname) as fullname
        FROM doctor_cert 
        INNER JOIN patient ON doctor_cert.hn = patient.hn
        WHERE doctor_cert.vn = :vn 
        ORDER BY doctor_cert.create_datetime DESC", 
        ['vn'=>$vn]);

        return view('mdca.show',[
            'model'=>$model
        ]);
    }
}
