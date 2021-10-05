@extends('layouts.master')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            @include('layouts/error')
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('employe.update', $result->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                         @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">{{ $result->name }}</div>
                            </div>
                            <div class="card-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="judul">Nama</label>
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
                                        <label for="judul">Email</label>
                                        <input type="text" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Masukkan email Perusahaan" value="{{ $result->email }}">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{  $result->companies_id }}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="judul">Perusahaan :</label>
                                        <select class="js-example-basic-single" name="companies_id">
                                            @foreach ($companies as $item)                                               
                                                <option value="{{ $item->id }}" 
                                                @php
                                                    if($result->companies_id == $item->id){
                                                        echo "selected";
                                                    }
                                                @endphp 
                                                >{{ $item->id }}</option>
                                            @endforeach
                                        </select>
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
@Push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush
<script>
    $(document).ready(function () {
        $('.js-example-basic-single').select2();
    });

</script>
@endsection
