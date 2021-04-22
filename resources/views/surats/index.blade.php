@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Kelola Surat Keluar</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('surats.create') }}"> Tambah Data</a>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
 
    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>No Surat</th>
            <th>Tanggal Surat</th>
            <th>Judul Surat</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($surats as $surat)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $surat->no_surat }}</td>
            <td>{{ $surat->tgl_surat }}</td>
            <td>{{ $surat->jdl_surat }}</td>
            <td class="text-center">
                <form action="{{ route('surats.destroy',$surat->id) }}" method="POST">
 
                    <a class="btn btn-primary btn-sm" href="{{ route('surats.edit',$surat->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $surats->links() !!}
 
@endsection