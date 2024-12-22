@extends('layouts.app');
@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Data Nilai Mahasiswa</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>Nilai UTS</th>
                                <th>Nilai UAS</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($nilai as $n)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $n->nama }}</td>
                                        <td>{{ $n->nilai_uts }}</td>
                                        <td>{{ $n->nilai_uas }}</td>
                                        <td>
                                            <button 
                                            href="{{ url('datanilai/'.$n->id.'/edit') }}"
                                            class="btn btn-primary">Edit
                                            </button>
                                            <form action="{{ route('datanilai.destroy', $n->id) }}" method="POST"
                                                style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Apakah Anda Yakin?')">
                                                    Hapus
                                                </button>
                                            </form>                                    
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection