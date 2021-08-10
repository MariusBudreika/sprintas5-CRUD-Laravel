@extends('layouts.app')
@section('content')
<div>
    @if ($errors->any())
        <h4 style="color: red">{{ $errors->first() }}</h4>
    @endif
</div>


<div class="card-body">
    <table class="table">
        <tr>
            <th>Project</th>
            <th>Employee</th>
            <th>Actions</th>
        </tr>
        @foreach ($projects as $project)
            <tr>
                <td>{{ $project->project }}</td>
                <td>
                    @foreach ($project->employees as $empData)
                        {{ $empData->name }}
                        @if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                </td>
                <td>
                    <form action={{ route('project.destroy', $project->id) }} method="POST">
                        <a class="btn btn-success" href={{ route('project.edit', $project->id) }}>Edit</a>
                        @csrf @method('delete')
                        <input type="submit" class="btn btn-danger" value="Delete" />
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('project.create') }}" class="btn btn-success">Add Project</a>
    </div>
</div>
@endsection
