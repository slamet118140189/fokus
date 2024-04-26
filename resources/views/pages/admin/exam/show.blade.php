@extends('layouts.adminlte.app')

@section('header', 'Detail Ujian')

@section('content')
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
@endsection
