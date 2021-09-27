<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Kecamatan;
use App\Models\ec_provinces;
use App\Models\ec_cities;
use App\Models\ec_districts;
use App\Models\ec_subdistricts;
use App\Models\ec_postalcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::select(DB::raw('id_customer,nama_customer,alamat_customer,foto_customer,file_path_customer,ec_subdistricts.subdis_name'))->join('ec_subdistricts','ec_subdistricts.subdis_id','=','customer.subdis_id')->get();
        return view('customer.customer_index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prov = ec_provinces::all();
        //$prov = 0;
        //dd($prov);
        return view('customer.customer_create_1',compact('prov'));
    }
    public function create2()
    {
        $prov = ec_provinces::all();
        return view('customer.customer_create_2',compact('prov'));
    }

    public function fetchCity(Request $request)
    {
        $data['cities'] = ec_cities::where("prov_id",$request->prov_id)->get(["city_name", "city_id"]);
        //dd($data);
        return response()->json($data);
    }

    public function fetchDistrics(Request $request)
    {
        //dd($request->dist_id);
        $data['districs'] = ec_districts::where("city_id",$request->dist_id)->get(["dis_name", "dis_id"]);
        //dd($data);
        return response()->json($data);
    }
    
    public function fetchSubDistrics(Request $request)
    {
        //dd($request->subdis_id);
       
    
        $data['subdistrics'] = ec_subdistricts::where("dis_id",$request->subdis_id)->get(["subdis_id","subdis_name"]);
        //dd($data);
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        
        $this->validate($request, [
            'nama_customer'     => 'required',
            'alamat_customer' => 'required',
            'id_kelurahan' => 'required',
            'image' => 'required'
        ]);
        Customer::create([
            'nama_customer' => $request->nama_customer,
            'alamat_customer' => $request->alamat_customer,
            'subdis_id' => $request->id_kelurahan,
            'foto_customer' => $request->image,
        ]);
        
        return redirect('/customer-tambah1')->with('status','Data Berhasil Ditambahkan!!!'); 
        
    }
    public function store2(Request $request)
    {
        
        $this->validate($request, [
            'nama_customer'     => 'required',
            'alamat_customer' => 'required',
            'id_kelurahan' => 'required',
            'image' => 'required'
        ]);
        $image = str_replace('data:image/png;base64,', '', $request->image);
        $image = str_replace(' ', ' + ', $image);
        $imageName = $request->nama_customer.time(). '.png';
        Storage::disk('local')->put($imageName, base64_decode($image));
        //dd($path);
        Customer::create([
            'nama_customer' => $request->nama_customer,
            'alamat_customer' => $request->alamat_customer,
            'subdis_id' => $request->id_kelurahan,
            'file_path_customer' => $imageName,
        ]);
        
        return redirect('/customer-tambah2')->with('status','Data Berhasil Ditambahkan!!!'); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
