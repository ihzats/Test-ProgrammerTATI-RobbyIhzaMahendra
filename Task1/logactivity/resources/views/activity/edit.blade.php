@extends('layouts.layout')

@section('content')
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Edit Data Items</h5>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('activity.update', $post->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="activityy" class="form-label">activity activity</label>
                                <input type="text" class="form-control" name="activityy" id="activity"
                                    aria-describedby="activityHelp" value="{{ $post->activity }}" required>
                                @error('activity')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="status" value="pending">

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('activity.index') }}" class="btn btn-md btn-dark">back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
