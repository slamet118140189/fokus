@extends('layouts.adminlte.app')

@section('header', 'Detail Ujian')

@section('content')
    @if (session('failed'))
        <div class="alert alert-danger">
            {{ session('failed') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Ujian</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 30%">ID</th>
                                <td>{{ $exam->id }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{ $exam->name }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Mulai</th>
                                <td>{{ $exam->start_date }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Akhir</th>
                                <td>{{ $exam->end_date }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Subtest</th>
                                <td>{{ $exam->number_of_subtest }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detail Subtest</h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                            Tambah Subtest
                        </button>
                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Form Tambah Subtest</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form-tambah-subtest" action="{{ route('exam.subtest.store', $exam) }}"
                                            method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="namaSubtest">Nama Subtest:</label>
                                                <input type="text" class="form-control" id="namaSubtest" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="durasi">Durasi (menit):</label>
                                                <input type="number" class="form-control" id="durasi" name="duration">
                                            </div>
                                            <div class="form-group">
                                                <label for="jumlahPertanyaan">Jumlah Pertanyaan:</label>
                                                <input type="number" class="form-control" id="jumlahPertanyaan"
                                                    name="number_of_question">
                                            </div>
                                            <input type="hidden" id="examId" name="exam_id" value="{{ $exam->id }}">
                                        </form>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" form="form-tambah-subtest">Save
                                            changes</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                    </li>
                </ul>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th style="width: 30%">ID</th>
                                <th>Nama Subtest</th>
                                <th>Durasi (Menit)</th>
                                <th>Jumlah Soal</th>
                                <th>Aksi</th>
                            </tr>
                            @forelse ($exam->subtests as $subtest)
                                <tr>
                                    <td> {{ $subtest->id }} </td>
                                    <td> {{ $subtest->name }} </td>
                                    <td> {{ $subtest->duration }} </td>
                                    <td> {{ $subtest->number_of_question }} </td>
                                    {{-- <td> {{ $subtest->question->count }} </td> --}}
                                    <td>
                                        <!-- Tambahkan link untuk show, edit, dan delete -->
                                        <a href="{{ route('exam.subtest.index', [$exam, $subtest]) }}"
                                            class="btn btn-info btn-sm">Show</a>
                                        <form action="{{ route('exam.subtest.destroy', [$exam, $subtest]) }}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No DatA</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
