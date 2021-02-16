<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Personas;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function persona($id){

        $persona = Personas::findOrfail(decrypt($id));
        // $pdf = PDF::loadView('pdf.persona');
        return view('pdf.persona',['persona' => $persona]);
    }
}
