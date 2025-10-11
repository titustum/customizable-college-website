<?php

use Livewire\Volt\Component;
use App\Models\Applicant;
use Barryvdh\DomPDF\Facade\Pdf;


new 
#[Title('Download Admission Letter | Tetu Technical & Vocational College')]
class extends Component {
    //
    public $id;

    public function mount($id)
    {
        $this->id = $id;
        $this->applicant = Application::findOrFail($this->id);
        $this->download();
    }

    public function download()
    {
        $applicant = $this->applicant;

        $pdf = Pdf::loadView('pdf.admission-letter', [
            'applicant' => $applicant
        ]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'Admission-Letter.pdf');
    }
}


?>