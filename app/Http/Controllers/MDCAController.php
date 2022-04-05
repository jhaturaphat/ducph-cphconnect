<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\HDoctorCert;
use PDF;

class MDCAController extends Controller
{
    /*
    * @return \Illuminate\Http\Request
    */
    public function index($hn='000088973'){
        

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

       $pdf = PDF::loadView('mdca.show', $model)->setPaper('a4')->save("pdf_mdca/pdf3.pdf");
        exit;
        //$pdf = PDF::loadView('mdca.show', ['model'=>$model]);
        //return $pdf->stream();
        //Storage::put('public/pdf/invoice.pdf', $pdf->output());
        //return $pdf->download('codingdriver.pdf');

        // PDF############################

        $pdf = PDF::loadView('mdca.show', ['model'=>$model]);

        $pdf->setOptions(['isPhpEnabled'=> true,'isRemoteEnabled' => true]);

        $filename = "generatepdf.pdf";

        // Save file to the directory

        $pdf->save("pdf_mdca/".$filename);

        //Download Pdf

        return $pdf->download("generatepdf.pdf");

        // Or return to view pdf

        //return view(‘pdfview’);

        // PDF############################

        // return view('mdca.show',[
        //     'model'=>$model
        // ]);
    }
}
