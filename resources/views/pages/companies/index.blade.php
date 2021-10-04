@extends('layouts.master')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            @include('layouts/error')
            
            <div class="row">
                <div class="col-md-12">
                    <form action="#" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Pilih Tahun Akademik</div>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Tahun akademik</label>
                                        <select class="form-control @error('id_tahunakademik') is-invalid @enderror"
                                            id="id_tahunakademik" name="id_tahunakademik">
                                            <option value="" selected="selected">---- Pilih Tahun ----</option>
                                            {{-- @foreach ($tahun as $item)
                                            <option value="{{ $item->id}}"
                                                {{ (old("id") == $item->id ? "selected":" ") }}>
                                                {{ $item->tahun_periode}}</option>
                                            @endforeach --}}
                                        </select>
                                        @error('id_tahunakademik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                      <br>
                        @if (isset($data))
                        
                        <div class="row">
                                <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">Kartu Rencana Studi</div>
                                    </div>
                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table id="add-row" class="display table table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">Nomor</th>
                                                        <th width="25%">Nama Matkul</th>
                                                        <th width="15%">SKS</th>
                                                        <th width="15%">Nilai</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
												<tr>
													<th colspan="1" style="text-align:center;">Jumlah SKS</th>
													
                                                    @php
                                                        $total=0;
                                                        $ips=0;
                                                    @endphp
													
													{{-- <th>{{ $data->details->matkul->sks}}</th> --}}
                                                    @foreach ($data as $item)
                                                        @foreach ($item->details as $val)
                                                                @php                                                                   
                                                                    $total += $val->matkul->sks;
                                                                    $ips += $val->nilai * $val->matkul->sks;
                                                                    @endphp
                                                        {{-- {{ $val->nilai }} --}}
                                                        @endforeach                                                       
                                                        @endforeach
                                                    <td colspan="1" style="text-align:center;">{{ $total }}</td>
                                                    
													
												</tr>
                                                <tr>
                                                    <th colspan="1" style="text-align:center;">IPS</th>
                                                    <td colspan="1" style="text-align:center;">{{ $ips/$total }}</td>
                                                </tr>
											</tfoot>
                                                <tbody>
                                                    @forelse ($data as $item) 
                                                                                                      
                                                    <tr>
                                                        @foreach ($item->details as $val)
                                                        <tr>   
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $val->matkul->nama_matkul }}</td>
                                                            <td>{{ $val->matkul->sks }}</td>
                                                            <td>
                                                                @if ($val->nilai==4)
                                                                    A
                                                                @elseif($val->nilai==3)
                                                                B
                                                                @elseif($val->nilai==2)
                                                                C
                                                                @elseif($val->nilai==1)
                                                                D
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                      
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
                                </div>
                               

                            </div>
                        </div>
                        {{-- jika ada tahun --}}
                        @endif
                </div>
                </form>
            </div>
            {{-- @endif --}}
        </div>
    </div>
</div>
</div>
@endsection
