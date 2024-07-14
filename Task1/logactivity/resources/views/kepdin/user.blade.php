@extends('layouts.layout')

@section('content')
    <div class="container-fluid">

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Users Management</h5>
                        <a type="button" href="{{ route('users.create') }}" class="btn btn-outline-secondary m-1">Add
                            Users</a>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle">
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Id</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Name</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Email</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Type Account</h6>
                                        </th>
                                        {{-- <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Atasan</h6>
                                        </th> --}}
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Action</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $id = 1; ?>
                                    @forelse ($users as $usr)
                                        <tr>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0">{{ $id++ }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-1">{{ $usr->name }}</h6>

                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $usr->email }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="badge bg-primary rounded-3 fw-semibold">
                                                        {{ $usr->type }}
                                                    </span>
                                                </div>
                                            </td>
                                            {{-- <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $usr->supervisor_id }}</p>
                                            </td> --}}
                                            <td class="border-bottom-0">
                                                <div class="d-flex align-items-center gap-2">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('users.destroy', $usr->id) }}" method="POST">
                                                        <a href="{{ route('users.edit', $usr->id) }}"
                                                            class="btn btn-outline-warning m-1">Change</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-outline-danger m-1">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td class="text-center text-mute border-bottom-0" colspan="5">Result not
                                                found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
