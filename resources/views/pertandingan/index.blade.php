@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pertandingan</h6>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
            
            <form action="{{ route('pertandingan.store') }}" method="post">
                @csrf
                <div class="form-row align-items-center">
                    <div class="col-3">
                        <label for="klub_1">Klub 1</label>
                        <select class="form-control" id="klub_1" name="klub_1[]">
                            <option value="" selected disabled>Pilih</option>
                            @foreach ($klub as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="klub_2">Klub 2</label>
                        <select class="form-control" id="klub_2" name="klub_2[]">
                            <option value="" selected disabled>Pilih</option>
                            @foreach ($klub as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2">
                        <label for="score_1">Score 1</label>
                        <input type="number" class="form-control" id="score_1" name="score_1[]" min="0">
                    </div>
                    <div class="col-2">
                        <label for="score_2">Score 2</label>
                        <input type="number" class="form-control" id="score_2" name="score_2[]" min="0">
                    </div>
                    <div class="col-1 align-self-end">
                        <button type="button" class="btn btn-success add-field">+</button>
                    </div>
                </div>

                <div class="dynamic-form"></div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var template = `<div class="form-row align-items-center mt-2">
                        <div class="col-3">
                            <label for="klub_1">Klub 1</label>
                            <select class="form-control" id="klub_1" name="klub_1[]">
                                <option value="" selected disabled>Pilih</option>
                                @foreach ($klub as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="klub_2">Klub 2</label>
                            <select class="form-control" id="klub_2" name="klub_2[]">
                                <option value="" selected disabled>Pilih</option>
                                @foreach ($klub as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-2">
                            <label for="score_1">Score 1</label>
                            <input type="number" class="form-control" id="score_1" name="score_1[]" min="0">
                        </div>
                        <div class="col-2">
                            <label for="score_2">Score 2</label>
                            <input type="number" class="form-control" id="score_2" name="score_2[]" min="0">
                        </div>
                        <div class="col-1 align-self-end">
                            <button type="button" class="btn btn-danger delete-field">-</button>
                        </div>
                    </div>`;

    $('.add-field').click(function() {
        $('.dynamic-form').append(template);
    });

    $('.fields').on('click', '.delete-field', function(){
        $(this).parent().remove();
    });
</script>
@endsection