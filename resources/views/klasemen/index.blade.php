@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Klasemen</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nama Klub</th>
                            <th>Main</th>
                            <th>Menang</th>
                            <th>Seri</th>
                            <th>Kalah</th>
                            <th>Gol Menang</th>
                            <th>Gol Kalah</th>
                            <th>Poin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($klasemen as $key => $item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->klub->nama }}</td>
                                <td>{{ $item->bermain }}</td>
                                <td>{{ $item->menang }}</td>
                                <td>{{ $item->seri }}</td>
                                <td>{{ $item->kalah }}</td>
                                <td>{{ $item->gol_masuk }}</td>
                                <td>{{ $item->gol_kebobolan }}</td>
                                <td>{{ $item->poin }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
