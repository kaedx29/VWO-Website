@extends('layouts.app')

@section('title', 'Data Home')

@section('content')

<div class="container">
    <a href="/admin/sliders/create" class="btn btn-primary mb-1">Tambah Data</a>

    @if ($message = Session::get('message'))
        <div class="alert alert-success">
            <strong>Berhasil</strong>
            <p>{{$message}}</p>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar Besar</th>
                    <th>Deskripsi</th>
                    <th>Judul Kecil</th>
                    <th>Gambar Kecil</th>
                    <th>Deskripsi Kecil</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1
                @endphp
                @foreach ($sliders as $slider)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>
                        <img src="/image/{{ $slider->imageBesar }}" alt="" class="img-fluid" width="90">
                    </td>

                    <td>{{ $slider->description }}</td>
                    <td>{{ $slider->titleKecil }}</td>
                    <td>
                        <img src="/image/{{ $slider->imageKecil }}" alt="" class="img-fluid" width="90">
                    </td>
                    <td>{{ $slider->descriptionKecil }}</td>
                    <td>
                        <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST">
                        @csrf    
                        @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>      
</div>

@endsection