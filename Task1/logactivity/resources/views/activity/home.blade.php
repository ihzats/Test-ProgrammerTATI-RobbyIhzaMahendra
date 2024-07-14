@extends('layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold mb-4">Activities</h5>
                        <?php if (Auth::user()->type == "kepdang" || Auth::user()->type == "staff" ) {?>
                            <a type="button" href="{{ route('activity.create') }}" class="btn btn-outline-secondary m-1">Add
                                Activity</a>
                        <?php } ?>
                        <form action="">
                        <div class="input-group d-flex justify-content-end">
                            <div class="form-outline" data-mdb-input-init>
                              <input type="search" id="form1" class="form-control" name="search" placeholder="Search..."/>
                            </div>
                            {{-- <button type="button" class="btn btn-primary" data-mdb-ripple-init>
                              <i class="ti ti-search"></i>
                            </button> --}}
                          </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table text-nowrap mb-0 align-middle col-12">
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
                                <thead class="text-dark fs-4">
                                    <tr>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Id</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">User</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Activity</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Date</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Status</h6>
                                        </th>
                                        <th class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">Action</h6>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $id = 1; ?>
                                    @forelse ($activities as $post)

                                        <tr>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-0"><?= $id++ ?></h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-semibold mb-1">{{  $post->name }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <h6 class="fw-normal mb-1">{{ $post->activity }}</h6>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ strtok($post->created_at, " ") }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <p class="mb-0 fw-normal">{{ $post->status }}</p>
                                            </td>
                                            <td class="border-bottom-0">
                                                <div class="d-flex align-items-center gap-2">
                                                    <?php
                                                    if (Auth::user()->type == "kepdang" && $post->status != "Disetujui")  {
                                                        if ($post->user_id == Auth::user()->id) {
                                                        ?>
                                                         <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                         action="{{ route('activity.destroy', $post->id) }}"
                                                         method="POST">
                                                         <a href="{{ route('activity.edit', $post->id) }}"
                                                             class="btn btn-outline-warning m-1">Edit</a>
                                                         @csrf
                                                         @method('DELETE')
                                                         <button type="submit"
                                                             class="btn btn-outline-danger m-1">Hapus</button>
                                                     </form>
                                                    <?php } else { ?>
                                                        <form action="{{ route('activity.update', $post->id) }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="Disetujui">
                                                            <button type="submit" class="btn btn-outline-success">Setujui</button>
                                                        </form>
                                                        <form action="{{ route('activity.update', $post->id) }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="Ditolak">
                                                            <button type="submit" class="btn btn-outline-danger">Tolak</button>
                                                        </form>
                                                    <?php }
                                                }else if (Auth::user()->type == "staff" && $post->status != "Disetujui") {?>
                                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                         action="{{ route('activity.destroy', $post->id) }}"
                                                         method="POST">
                                                         <a href="{{ route('activity.edit', $post->id) }}"
                                                             class="btn btn-outline-warning m-1">Edit</a>
                                                         @csrf
                                                         @method('DELETE')
                                                         <button type="submit"
                                                             class="btn btn-outline-danger m-1">Hapus</button>
                                                     </form>
                                                    <?php
                                                }else if (Auth::user()->type == "kepdin"){ ?>
                                                        <form action="{{ route('activity.update', $post->id) }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="Disetujui">
                                                            <button type="submit" class="btn btn-outline-success">Setujui</button>
                                                        </form>
                                                        <form action="{{ route('activity.update', $post->id) }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="Ditolak">
                                                            <button type="submit" class="btn btn-outline-danger">Tolak</button>
                                                        </form>
                                                    <?php
                                                }else { ?>
                                                        <button type="submit" class="btn btn-outline-danger">Tidak Bisa Diedit</button>
                                                    <?php  } ?>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center text-mute border-bottom-0" colspan="7">Data Permohonan
                                                tidak
                                                tersedia</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $activities->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
