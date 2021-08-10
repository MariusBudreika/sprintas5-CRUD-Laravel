@extends('layouts.app')
@section('content')
<div class="card-body">
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Project</th>
            <th>Action</th>
        </tr>
        @foreach ($employees as $employee)
        <tr>
            <td>{{ $employee->name }}</td>
            <td>{{ $employee->project->project }}</td>
            <td>
                <form action={{ route('employee.destroy', $employee->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('employee.edit', $employee->id) }}>Edit</a>
                    @csrf @method('delete')
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('employee.create') }}" class="btn btn-success">Create employee</a>
    </div>
</div>
@endsection

