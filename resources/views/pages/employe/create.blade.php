@extends('layouts.master')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            @include('layouts/error')
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('employe.store')}}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Tambah Karyawan</div>
                            </div>
                            <div class="card-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="judul">Nama</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Masukkan Nama Perusahaan" value="{{ old('name') }}">
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
                                            placeholder="Masukkan email Perusahaan" value="{{ old('email') }}">
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="judul">Perusahaan :</label>
                                        <select class="js-example-basic-single" id="companies" name="companies_id" style="width:120px">
                                            @foreach ($result as $item)                                               
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
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

       $(document).ready(function () {
        $('.js-example-basic-single').select2();

    });

        // $("#companies").select2({
        //     ajax: {
        //         url: "/employe",
        //         dataType: 'json',
        //         delay: 250,
        //         data: function (params) {
        //             return {
        //                 q: params.term, // search term
        //                 page: params.page
        //             };
        //         },
        //         processResults: function (data, params) {
        //             params.page = params.page || 1;

        //             return {
        //                 results: data.items,
        //                 pagination: {
        //                     more: (params.page * 10) < data.total_count
        //                 }
        //             };
        //         },
        //         cache: true
        //     },
        //     placeholder: 'Search for a repository',
        //     minimumInputLength: 1,
        //     templateResult: function(repo){
        //         if(repo.loading) return repo.name;

        //     },
        //     templateSelection : function(repo){
        //         return repo.name;
        //     },
        //     escapeMarkup : function(markup){ return markup;}
        // });

    });


</script>
@endsection
