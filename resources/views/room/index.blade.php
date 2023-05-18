@extends('layout.template');
       
        <!-- START DATA -->
@section('konten');
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{url('room')}}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='room/create' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">ID</th>
                            <th class="col-md-4">Room Type ID</th>
                            <th class="col-md-2">Room Name</th>
                            <th class="col-md-2">Area</th>
                            <th class="col-md-2">Price</th>
                            <th class="col-md-2">Facility</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=$data->firstItem()?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$item->ID}}</td>
                            <td>{{$item->roomTypeID}}</td>
                            <td>{{$item->roomName}}</td>
                            <td>{{$item->area}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->facility}}</td>
                            <td>
                                <a href='{{url('room/'.$item->ID.'/edit')}}' class="btn btn-warning btn-sm">Edit</a>
                                <form class = 'd-inline' action="{{url('room/'.$item->ID)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit"  class="btn btn-danger btn-sm">Del</button>

                                </form>

                               
        
                            </td>
                        </tr>
                        <?php $i++?>  
                        @endforeach
                        
                    </tbody>
                </table>
               {{ $data->links() }}
          </div>
          <!-- AKHIR DATA -->
@endsection

