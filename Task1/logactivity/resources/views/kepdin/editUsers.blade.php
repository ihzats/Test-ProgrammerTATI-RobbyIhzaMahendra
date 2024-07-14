@extends('layouts.layout')

@section('content')
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Edit Data Users</h5>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('users.update', $users->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    aria-describedby="nameHelp" required value=" {{ $users->name }}">
                                <div id="nameHelp" class="form-text">Insert name of user</div>
                                @error('name')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Your Email</label>
                                <input type="text" class="form-control" name="email" id="email"
                                    aria-describedby="emailHelp" required value="{{ $users->email }}">
                                <div id="emailHelp" class="form-text">Insert email of user</div>
                                @error('email')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Your role</label>
                                <select class="form-select" name="role" id="role" aria-describedby="roleHelp"
                                    required>
                                    <option value="2" {{ $users->type == 'kepdin' ? 'selected' : '' }} >Kepala Dinas</option>
                                    <option value="1" {{ $users->type == 'kepdang' ? 'selected' : '' }}>Kepala Bidang</option>
                                    <option value="0" {{ $users->type == 'Staff' ? 'selected' : '' }}>Staff</option>
                                </select>
                                <div id="roleHelp" class="form-text">Insert role user</div>
                                @error('role')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="supervisor_id" class="form-label">Atasan</label>
                                <select class="form-select" name="supervisor_id" id="supervisor_id" aria-describedby="supervisor_idHelp"
                                    required>
                                    <option disabled>None</option>
                                        @foreach($allusers as $user)
                                        <?php $typee;
                                        if ($user->type != 'staff' ) {
                                            if ( $user->type == 'kepdang' && !in_array($user->id, $supervisors)) {
                                                $typee = "Kepala Bidang";
                                                ?>
                                                <option value="{{ $user->id }}">{{ $user->name . ' - ' . $typee }}</option>
                                                 <?php
                                            } elseif ($user->type == 'kepdin') {
                                                $typee = "Kepala Dinas";
                                                 ?>
                                                <option value="{{ $user->id }}">{{ $user->name . ' - ' . $typee }}</option>
                                                <?php
                                            }
                                            ?>
                                         <?php
                                        }
                                         ?>
                                        @endforeach
                                </select>
                                <div id="supervisor_idHelp" class="form-text">Insert supervisor user</div>
                                @error('supervisor_id')
                                    <div class="alert alert-danger" supervisor_id="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
