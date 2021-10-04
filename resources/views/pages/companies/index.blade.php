@extends('layouts.master')

@section('content')
<div class="main-panel">
    @include('layouts/error')
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">List Perusahaan</div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th width="5%">Nomor</th>
                                            <th width="25%">Nama Perusahaan</th>
                                            <th width="15%">Email</th>
                                            <th width="40%">Foto</th>
                                            <th style="width: 10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($result as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td><img src="{{ url($item->logoPath)}}" alt="" style="width:80px"></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="#" type="button" data-toggle="tooltip" title=""
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="button" data-toggle="modal"
                                                        class="btn btn-link btn-danger" data-target="#destroy{{$item->id}}">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                    
                                                </div>

                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-5">
                                                Data tidak tersedia
                                            </td>
                                        </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <!-- Modal delete -->
                    @foreach ($result as $item)
                    <div class="modal fade" id="destroy{{$item->id}}" tabindex="-1" role="dialog"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('companies.destroy', $item->id)}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <div class="modal-body">
                                        <p class="small">Hapus Perusahaan<br>
                                            <b>{{$item->name}}</b></p>
                                        <input type="hidden" name="id" value="{{$item->id}}">
                                        <input type="hidden" name="type" value="Accept">
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
