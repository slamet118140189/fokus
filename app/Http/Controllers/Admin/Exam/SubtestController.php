<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Subtest;
use Illuminate\Http\Request;
use Mockery\Matcher\Subset;

class SubtestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subtests = Subtest::latest()->get();
        return view('pages.admin.subtest.index', compact('subtests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->input());
         // Validasi data yang diterima dari form
        $request->validate([
            'name' => 'required|max:255',
            'duration' => 'required|numeric',
            'number_of_question' => 'required|numeric',
            'exam_id' => 'required|numeric|exists:exams,id',
        ]);

        // Hapus kolom 'id' dari data yang dikirimkan
        $data = $request->except('id');

        // Buat data baru tanpa ID, database akan secara otomatis menghasilkan ID yang baru
        Subtest::create($data);

        // Redirect kembali ke halaman yang sesuai dengan kebutuhan aplikasi Anda
        return redirect()->route('exam.show', $request->exam_id)->with('success', 'Subtest berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam, Subtest $subtest)
    {
        // $subtest->load(
        //     [
        //         'questions'
        //     ]
        // );
        // return view('pages.admin.subtest.show', compact('subtest'));
        // $subtest->first();

        $subtest->load(['questions']);
        return view('pages.admin.subtest.show', compact('subtest'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam, Subtest $subtest)
    {
        // dd($exam, $subtest);
        if($subtest->delete()){
            return back()->with('warning', 'Subtest berhasil dihapus');
            // return to_route('exam.show', $exam)->with('success', 'Subtest berhasil ditambahkan');
        }
        return back()->with('failed', 'Subtest gagal dihapus');
        // $subtest = Subtest::findOrFail($id);
        // $subtest->delete();

        // return redirect()->route('exam.show', $request->exam_id)->with('success', 'Subtest berhasil ditambahkan');
    }
}
