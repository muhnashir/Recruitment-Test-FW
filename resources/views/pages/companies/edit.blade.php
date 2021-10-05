@extends('layouts.master')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            @include('layouts/error')
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('companies.update', $result->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                         @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Perusahaan {{ $result->name }}</div>
                            </div>
                            <div class="card-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="judul">Nama Perusahaan</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Masukkan Nama Perusahaan" value="{{ $result->name }}">
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="judul">Email Perusahaan</label>
                                        <input type="text" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Masukkan email Perusahaan" value="{{ $result->email }}">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="judul">Url Website</label>
                                        <input type="text" name="urlWebsite"
                                            class="form-control @error('urlWebsite') is-invalid @enderror"
                                            placeholder="example.com" value="{{ $result->urlWebsite }}">
                                        @error('urlWebsite')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror 
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Logo</label>
                                        <input type="file" name="logoPath" class="form-control-file"
                                            id="exampleFormControlFile1">
                                        <img src="{{ url($result->logoPath)}}" alt="" style="width:70px; margin-top:20px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
