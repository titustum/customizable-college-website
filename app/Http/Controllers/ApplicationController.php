<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Barryvdh\DomPDF\Facade\Pdf;

class ApplicationController extends Controller
{
    public function download($id)
    {
        $application = Application::findOrFail($id);

        $pdf = Pdf::loadView('pdf.admission-letter', compact('application'));

        return $pdf->download("{$application->full_name}-Admission-Letter.pdf");
    }
}
