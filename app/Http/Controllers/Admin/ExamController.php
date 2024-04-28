<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $transaksis = Transaksi::latest()->get();
        // return view('admin.transaksi.index', compact('transaksis'));

        $exams = Exam::latest()->get();
        return view('pages.admin.exam.index', compact('exams'));

        // return view('pages.admin.exam.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.exam.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'number_of_subtest' => 'required|numeric'
        ]);

        // Hapus kolom 'id' dari data yang dikirimkan
        $data = $request->except('id');

        // Buat data baru tanpa ID, database akan secara otomatis menghasilkan ID yang baru
        Exam::create($data);

        //redirect to index
        return redirect()->route('exam.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $exam = Exam::findOrFail($id);
        $exam->load(
            [
                'subtests'
            ]
        );
        return view('pages.admin.exam.show', compact('exam'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $exam = Exam::findOrFail($id);
        return view('pages.admin.exam.update', compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'number_of_subtest' => 'required|numeric'
        ]);

        $exam = Exam::FindOrFail($id);

        $exam->update($request->all());

        return redirect()->route('exam.index')->with(['success' => 'Data Berhasil Disimpan!']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exam = Exam::findOrFail($id);
        $exam->delete();

        return redirect()->route('exam.index')->with('sukses', 'Berhasil Hapus Data!');
    }
}
