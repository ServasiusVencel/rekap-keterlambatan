<?php

namespace App\Http\Controllers;

use App\Models\lates;
use App\Models\students;
use App\Models\user;
use PDF;
use App\Exports\latesExport;
use Excel;
use Illuminate\Http\Request;

class LatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = students::all();
        $lates = lates::with('student')->get();
        return view('late.index', compact('lates', 'students'));
    }

    public function rekap()
    {
        $students = students::all();
        $lates = lates::with('student')->get();
        
        return view('late.rekap ', compact('lates', 'students'));
    }

    public function detail($id){
        $student = students::find($id);
        $lates = Lates::where('student_id', $id)->with('student')->get();

        return view('late.detail',  compact('student' , 'lates'));

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = students::all();
        return view('late.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'date_time_late' => 'required',
           'information' => 'required',
           'bukti' => 'required|image|file',
           'student_id' => 'required',
        ]);

        lates::create([
            'date_time_late' => $request->date_time_late,
            'information' => $request->information,
            'bukti' => $request->file('bukti')->store('bukti-images'),
            'student_id' => $request->student_id,
        ]);

        return redirect()->back()->with('success', 'Berhasil menginput data keterlambatan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $students = students::with('late', 'rombel', 'rayon')->find($id);
        return view('late.detail', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(lates $lates, $id)
    {
        $lates = lates::find($id);
        $students = students::all();
        
        return view('late.edit', compact('lates', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, lates $lates, $id)
    {
        $request->validate([
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'required|image|file',
         ]);
 
        lates::where('id', $id)->update([
            'date_time_late' => $request->date_time_late, 
            'information' => $request->information, 
            'bukti' => $request->file('bukti')->store('bukti-images'),
        ]);

         return redirect()->back()->with('success', 'Berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lates $lates, $id)
    {
        lates::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }

    public function downloadPDF($id){


        $lates = lates::find($id)->toArray();
        view()->share('lates', $lates);

        $students = students::where('id', $lates['student_id'])->with('rayon', 'rombel')->first()->toArray();

        $pembimbing = User::where('id', $students['rayon']['user_id'])->first();

        $pdf = PDF::loadView('late.print', compact('lates', 'students', 'pembimbing'));
        return $pdf->download('Surat Pernyataan Keterlambatan.pdf');
}

public function createExcel()
{

	$file_name = 'rekap keterlambatan'.'.xlsx';

	return Excel::download(new latesExport, $file_name);

}

public function indexPs()
{
    // Assuming you have a logged-in user who is the "pembimbing siswa" (PS)
    $pembimbingSiswa = auth()->user();

    // Fetch students with the same rayon as the pembimbing siswa
    $lates = Late::whereHas('student', function ($query) use ($pembimbingSiswa) {
        $query->where('rayon_id', $pembimbingSiswa->id);
    })
    ->with(['student' => function ($query) {
        $query->with(['rombel', 'rayon']);
    }])
    ->get();

    return view('ps.lates', compact('lates'));
}
}