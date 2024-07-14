@extends('layouts.layout')

@section('content')
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Tambah Data Permohonan</h5>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('activity.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="activity" class="form-label">Todays Activity</label>
                                <input type="text" class="form-control" name="activity" id="activity"
                                    aria-describedby="activityHelp" required>
                                @error('activity')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('activity.index') }}" class="btn btn-dark">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
