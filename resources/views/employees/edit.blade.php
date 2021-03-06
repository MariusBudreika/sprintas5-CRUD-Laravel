@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change Employee Info</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('employee.update', $employee->id) }}">
                        @csrf @method("PUT")
                        <div class="form-group">
                            <label for="">Name: </label>
                            <input type="text" name="name" class="form-control" value="{{ $employee->name }}">
                        </div>
                        <div class="form-group">
                            <label>Šalis: </label>
                            <select name="country_id" id="" class="form-control">
                                @foreach ($projects as $project)
                                <option value="{{ $project->id }}" @if($project->id == $employee->project_id) selected="selected" @endif>{{ $project->project }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

