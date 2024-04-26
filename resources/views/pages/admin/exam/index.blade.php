@extends('layouts.adminlte.app')

@section('header', 'Manajemen Ujian')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Title</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            Start creating your amazing application!
        </div>
        <div class="card-footer">
            Footer
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Ujian</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <a href="{{ route('exam.create') }}" class="btn-sm btn-primary">Tambah Ujian</a>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Akhir</th>
                        <th>Jumlah Subtest</th>
                        <th>Action</th> <!-- Tambah kolom action -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exams as $exam)
                        <tr>
                            <td>{{ $exam->id }}</td>
                            <td>{{ $exam->name }}</td>
                            <td>{{ $exam->start_date }}</td>
                            <td>{{ $exam->end_date }}</td>
                            <td>{{ $exam->number_of_subtest }}</td>
                            <td>
                                <!-- Tambahkan link untuk show, edit, dan delete -->
                                <a href="{{ route('exam.show', $exam->id) }}" class="btn btn-info btn-sm">Show</a>
                                <a href="{{ route('exam.edit', $exam->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('exam.destroy', $exam->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

@section('js')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
