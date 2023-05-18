<?php

namespace App\Http\Controllers;

use App\Models\room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris=2;
        if(strlen($katakunci)){
            $data = room::where('ID','like',"%$katakunci%")
                    ->orWhere('roomTypeID','like',"%$katakunci%")
                    ->orWhere('roomName','like',"%$katakunci%")
                    ->orWhere('area','like',"%$katakunci%")
                    ->orWhere('price','like',"%$katakunci%")
                    ->orWhere('facility','like',"%$katakunci%")
                    ->paginate($jumlahbaris);



        }else{
            $data = room::orderBy('ID','asc')->paginate($jumlahbaris);
        }
        $data = room::orderBy('ID','asc')->paginate(5);
        return view('room.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('room.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ID'=>'required|numeric|unique:rooms,ID',
            'roomTypeID'=>'required|numeric:rooms,roomTypeID',
            'roomName'=>'required:rooms,roomName',
            'area'=>'required:rooms,area',
            'price'=>'required|numeric:rooms,price',
            'facility'=>'required:rooms,facility'

        ],[
            'ID.required' => 'ID wajib diisi',
            'ID.numeric' => 'ID wajib dalam angka',
            'ID.unique' => 'ID yang diisikan sudah ada dalam database',
            'roomTypeID.required' => 'Room Type ID wajib diisi',
            'roomTypeID.numeric' => 'Room Type ID wajib dalam angka',
            'roomName.required' => 'Room Name wajib diisi',
            'area.required' => 'Area wajib diisi',
            'price.required' => 'Price wajib diisi',
            'Facility.required' => 'Facility wajib diisi',
            


        ]);
        $data = [
            'ID'=>$request->ID,
            'roomTypeID'=>$request->roomTypeID,
            'roomName'=>$request->roomName,
            'area'=>$request->area,
            'price'=>$request->price,
            'facility'=>$request->facility
        ];

        room::create($data);
        return redirect()->to('room')->with('success','Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        $data=room::where('ID',$id)->first();
        return view('room.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'roomTypeID'=>'required|numeric:rooms,roomTypeID',
            'roomName'=>'required:rooms,roomName',
            'area'=>'required:rooms,area',
            'price'=>'required|numeric:rooms,price',
            'facility'=>'required:rooms,facility'

        ],[
            'roomTypeID.required' => 'Room Type ID wajib diisi',
            'roomTypeID.numeric' => 'Room Type ID wajib dalam angka',
            'roomName.required' => 'Room Name wajib diisi',
            'area.required' => 'Area wajib diisi',
            'price.required' => 'Price wajib diisi',
            'Facility.required' => 'Facility wajib diisi',
            


        ]);
        $data = [
            'roomTypeID'=>$request->roomTypeID,
            'roomName'=>$request->roomName,
            'area'=>$request->area,
            'price'=>$request->price,
            'facility'=>$request->facility
        ];

        room::where('ID',$id)->update($data);
        return redirect()->to('room')->with('success','Berhasil menambahkan data');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        room::where('ID',$id)->delete();
        return redirect()->to('room')->with('success', "Berhasil melakukan delete data");
    }
}
