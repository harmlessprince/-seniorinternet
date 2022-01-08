@extends('layouts.app')
@push('styles')
    <!-- Custom styles for this page -->
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('p_heading')
    Semester
@endsection
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Semesters</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>No Of Courses</th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($semesters as $semester)
                        <tr>
                            <td>{{++$loop->index}}</td>
                            <td>{{$semester->name}}</td>
                            <td>{{$semester->courses_count}}</td>
                            <td>
                                <a href="{{route('semesters.show', $semester)}}" class="btn btn-sm btn-primary"> View {{$semester->name}}</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @push('scripts')
        <!-- Page level plugins -->
        <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script>
    @endpush

@endsection
