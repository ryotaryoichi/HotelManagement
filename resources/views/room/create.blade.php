@extends('layout.template');

<!-- START FORM -->
@section('konten')
@if($errors->any())
<div class ="pt-3">
    <div class ="alert alert-danger">
        <ul>
            @foreach ( $errors->all() as $item)
                <li>{{$item}}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
<form action= '{{ url('room') }}' method='post'>
@csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('room')}}' class="btn btn-secondary">kembali</a>
            <div class="mb-3 row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='ID' value="{{Session::get('id')}}" id="ID" >
                </div>
            </div>
            <div class="mb-3 row">
                <label for="roomTypeID" class="col-sm-2 col-form-label">Room Type ID</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='roomTypeID' value="{{Session::get('roomTypeID')}}" id="roomTypeID">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="roomName" class="col-sm-2 col-form-label">Room Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='roomName' value="{{Session::get('roomName')}}" id="roomName">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="area" class="col-sm-2 col-form-label">Area</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name='area' value="{{Session::get('area')}}"id="area">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                <input type="number" class="form-control" name='price' value="{{Session::get('price')}}" id="price">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="facility" class="col-sm-2 col-form-label">Facility</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name='facility' value="{{Session::get('facility')}}" id="facility">
                </div>
            </div>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
          </form>
        </div>
        <!-- AKHIR FORM -->
@endsection
