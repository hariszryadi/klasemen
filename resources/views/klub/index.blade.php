@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Klub</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('klub.store') }}" method="post">
                @csrf
                <div class="form-row align-items-center">
                    <div class="col-5">
                        <label class="sr-only" for="nama">Nama Klub</label>
                        <input type="text" class="form-control mb-2 @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama Klub">
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-5">
                        <label class="sr-only" for="kota">Kota Klub</label>
                        <input type="text" class="form-control mb-2 @error('kota') is-invalid @enderror" id="kota" name="kota" placeholder="Kota Klub">
                        @error('kota')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-2">
                      <button type="submit" class="btn btn-primary btn-block mb-2">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Klub</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Klub</th>
                            <th>Kota Klub</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($klub as $item)
                            <tr>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->kota }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
