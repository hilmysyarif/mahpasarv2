
@extends('layouts.fe')

@section('content')   
<div class="wrapper">
    <div class="title-head">
        <h2 class="title">Testimoni</h2>
    </div>

    @if (!empty($testi))
        <div class="testi mt-4">
            <div class="row">
                @foreach ($testi as $data)
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$data->name}}</h5>
                            <p class="card-text">{{$data->content}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="alert alert-warning mt-4">Upss.. Belum ada testimoni</div>
        
    @endif
</div>
@endsection