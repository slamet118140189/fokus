@extends('layouts.adminlte.app')

@section('header', 'Soal')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Soal</h3>

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
            @foreach ($subtests as $subtest)
                <p>Subtest Name: {{ $subtest->name }}</p>
                <!-- Tampilkan atribut lain dari subtes sesuai kebutuhan -->
            @endforeach
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Soal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subtests->questions as $question)
                        <tr>
                            <td>{{ $question->id }}</td>
                            <td>{{ $question->text }}</td>
                            {{-- <td>{{ $question->image_path }}</td> --}}
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
                <!--
                        <tfoot>
                            <tr>
                                <th>Rendering engine</th>
                                <th>Browser</th>
                                <th>Platform(s)</th>
                                <th>Engine version</th>
                                <th>CSS grade</th>
                            </tr>
                        </tfoot>
                    -->
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
