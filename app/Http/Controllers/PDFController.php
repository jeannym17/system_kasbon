<?php

namespace App\Http\Controllers;

use App\Models\Kelengkapan;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $kelengkapan = Kelengkapan::find($id);
        return view('pdf.print-kasbon', compact('kelengkapan'));
    }

    public function show($id)
    {
        $kelengkapan = Kelengkapan::find($id);
        return view('pdf.print-kasbon', compact('kelengkapan'));
    }
}
