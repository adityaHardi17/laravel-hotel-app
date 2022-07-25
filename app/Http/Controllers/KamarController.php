<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class KamarController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.kamar.data-kamar');
    }
    
    
    
    public function datatableKamar()
    {
        $data = [];
        $kamar = Kamar::get();
        foreach ($kamar as $item) {
            $data[] = [
                $item->id,
                $item->nama_kamar,
                $item->harga_kamar,
                    '<a href="/edit-kamar/'.$item->id.'" class="btn btn-primary">Edit</a>'
            ];
        }

        return [
            'data' => $data,
        ];
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createKamar()
    {
        return view('frontend.kamar.tambah-kamar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKamarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeKamar(Request $request)
    {
        $store = Kamar::storeKamar($request);
        if($store) return redirect('/kamar');
        else return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function show(Kamar $kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function editKamar($id)
    {
        $data['kamar'] = Kamar::find($id);

        return view('frontend.kamar.edit-kamar', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKamarRequest  $request
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function updateKamar(Request $request)
    {
        $update = Kamar::editKamar($request);
        if($update) return redirect('/kamar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamar $kamar)
    {
        //
    }
}
