<?php

namespace App\Http\Controllers;
use DB;
use App\Models\lokasi_toko;
use Illuminate\Http\Request;

class scanBarcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data="barcodeScanner";
        return view('barcode.scan-barcode',compact('data'));
    }
    
    public function scanKunjungan(){
        $data = "tokoScan";
        return view('toko.scan-barcode-kunjungan',compact('data'));
    }
    public function getLocationToko(Request $request){
        $data['location'] = lokasi_toko::where("barcode",$request->idtoko)->get(["latitude", "longitude","accuracy"]);
        //dd($data);
        return response()->json($data);
    }

    public function getDistanceFromLatLonInKm(Request $request) {
        //dd($request->barcode);
        $toko = DB::table('lokasi_toko')->where('barcode',$request->barcode)->get();
        //$toko = lokasi_toko::where('barcode',$request->barcode);
        //dd($toko);
        foreach($toko as $value){
            $lat = $value->latitude;
            $long = $value->longitude;
            $acc = $value->accuracy;
        }
        //dd($lat,$long,$acc);
        $earthRadius = 6371000; // Radius of the earth in meter
        //dd($dlat,$dlon);
        $lat_a = $request->latitude;
         $lon_a = $request->longitude;
         $lat_b = $lat;
         $lon_b = $long;
//dd($lat_a,$lon_a,$lat_b,$lat_b);
         $latFrom = deg2rad($lat_a);
         $lonFrom = deg2rad($lon_a);
         $latTo = deg2rad($lat_b);
         $lonTo = deg2rad($lon_b);
        //dd($latFrom,$lonFrom,$latTo,$lonTo);
         $latDelta = $latTo - $latFrom;
         $lonDelta = $lonTo - $lonFrom;
            //dd($latDelta,$lonDelta);
         $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
           cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
           //dd($angle);
         $betwenPoin = $angle * $earthRadius;
         dd($betwenPoin);
      
    }
        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
