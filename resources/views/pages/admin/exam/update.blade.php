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
            <h3 class="card-title">Edit Ujian</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('exam.update', $exam->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Menggunakan metode PUT untuk update -->

                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $exam->name }}" required>
                </div>
                <div class="form-group">
                    <label for="start_date">Tanggal Mulai:</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $exam->start_date }}" required>
                </div>
                <div class="form-group">
                    <label for="end_date">Tanggal Akhir:</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $exam->end_date }}" required>
                </div>
                <div class="form-group">
                    <label for="number_of_subtest">Jumlah Subtest:</label>
                    <input type="number" name="number_of_subtest" id="number_of_subtest" class="form-control" value="{{ $exam->number_of_subtest }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
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
