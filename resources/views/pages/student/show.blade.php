@extends('layouts.app')
@push('styles')
    <!-- Custom styles for this page -->
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('p_heading')
    Student
@endsection
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Name: {{$student->full_name}}</h6>
            <h6 class="m-0 font-weight-bold text-primary">Email: {{$student->email}}</h6>
            <h6 class="m-0 font-weight-bold text-primary">No Of 1st Semester Courses: {{$student->firstSemesterCourses->count()}}</h6>
            <h6 class="m-0 font-weight-bold text-primary">No Of 2nd Semester Courses: {{$student->secondSemesterCourses->count()}}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Course Code</th>
                            <th>Semester</th>
                            <th>Lecturer</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student->courses as $course)
                            <tr>
                                <td>{{ $course->code }}</td>
                                <td>{{$course->semester->name}}</td>
                                <td>{{ $course->lecturer->full_name }}</td>
                                <td>
                                    <a href="{{ route('courses.show', $course) }}" class="btn btn-sm btn-primary">
                                        View Course</a>
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
