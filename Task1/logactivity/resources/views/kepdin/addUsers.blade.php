@extends('layouts.layout')

@section('content')
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title fw-semibold mb-4">Edit Data Users</h5>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    aria-describedby="nameHelp" required>
                                <div id="nameHelp" class="form-text">Insert name of user</div>
                                @error('name')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Your Email</label>
                                <input type="text" class="form-control" name="email" id="email"
                                    aria-describedby="emailHelp" required>
                                <div id="emailHelp" class="form-text">Insert email of user</div>
                                @error('email')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Your password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    aria-describedby="passwordHelp" required>
                                <div id="passwordHelp" class="form-text">Insert password of user</div>
                                @error('password')
                                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Your role</label>
                                <select class="form-select" name="role" id="role" aria-describedby="roleHelp"
                                    required>
                                    <option disabled>Pilih Role</option>
                                    <option value="0">Staff</option>
                                    <option value="1">Kepala Bidang</option>
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
                                        @foreach($users as $user)
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
