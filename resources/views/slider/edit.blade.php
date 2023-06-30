@extends('layouts.app')

@section('title', 'Data Home')

@section('content')

<div class="container">
    <a href="/admin/sliders" class="btn btn-primary mb-1">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
                <img src="/image/{{ $slider->imageBesar }}" alt="" class="img-fluid">
                <div class="form-group">
                    <label for="">Gambar Besar</label>
                    <input type="file" class="form-control" name="imageBesar">
                </div>
                @error('imageBesar')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Deskripsi">{{ $slider->description }}</textarea>
                </div>
                @error('description')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="">Judul Kecil</label>
                    <input type="text" class="form-control" name="titleKecil" placeholder="Judul" value="{{ $slider->titleKecil }}">
                </div>
                @error('titleKecil')
                <small style="color:red">{{$message}}</small>
                @enderror
                <img src="/image/{{ $slider->imageKecil }}" alt="" class="img-fluid">
                <div class="form-group">
                    <label for="">Gambar</label>
                    <input type="file" class="form-control" name="imageKecil">
                </div>
                @error('image')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="">Deskripsi Kecil</label>
                    <textarea name="descriptionKecil" id="" cols="30" rows="10" class="form-control" placeholder="Deskripsi">{{ $slider->descriptionKecil }}</textarea>
                </div>
                @error('descriptionKecil')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
