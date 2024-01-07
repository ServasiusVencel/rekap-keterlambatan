<?php

namespace App\Http\Controllers;

use App\Models\students;
use App\Models\rayons;
use App\Models\rombels;
use App\Models\User;
use Illuminate\Http\Request;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = students::all();
        $rayons = rayons::all();
        $rombels = rombels::all();
        
        return view('student.index', compact('students', 'rayons', 'rombels'));
    }

    public function indexps()
    {
        $pembimbingSiswa = auth()->user();

        // Fetch students with the same rayon as the pembimbing siswa
        $students = students::whereHas('rayon', function ($query) use ($pembimbingSiswa) {
            $query->where('user_id', $pembimbingSiswa->id);
        })
        ->with('rombel', 'rayon') // Eager load relationships
        ->get();
    

        return view('ps.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rayons = rayons::all();
        $rombels = rombels::all();

        return view('student.create', compact('rayons', 'rombels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
        ]);

        students::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambah data!');
    }

    /**
     * Display the specified resource.
     */
    public function show(students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(students $students,$id)
    {
        $rayons = rayons::all();
        $rombels = rombels::all();
        $students = students::find($id);

        return view('student.edit', compact('students', 'rayons', 'rombels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, students $students, rayons $rayons, rombels $rombel, $id)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
        ]);

        students::where('id', $id)->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);
        
        

        return redirect()->route('students.home')->with('success', 'Berhasil menambah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        students::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
}
