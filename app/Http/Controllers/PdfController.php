<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function persona($id){

        // $pdf = PDF::loadView('pdf.persona');
        return view('pdf.persona');
    }
}
