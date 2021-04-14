<?php
namespace App\Http\Controllers;
use App\Models\donations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class ListOfDonation extends Controller
{
    //
    public function index(){
    //sssssssss
    }
 /**
  *  * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('benefits.donations.create');

    }
      /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        $user->donations()->create($request->all());
        return redirect()->route('donations.create');
    }
    public function apistore(Request $request)
    {   
        $user =Auth::user()->id;
        $donations =new donations();
        $donations->user_id=$user; 
        $donations->furniture=json_encode($request->{'donations_info.furniture'},JSON_UNESCAPED_UNICODE);
        $donations->clothes=json_encode($request->{'donations_info.clothes'},JSON_UNESCAPED_UNICODE);
        $donations->dishes=json_encode($request->{'donations_info.dishes'},JSON_UNESCAPED_UNICODE);
        $donations->electrical_tools=json_encode($request->{'donations_info.electrical_tools'},JSON_UNESCAPED_UNICODE);
        $donations->baby_things=json_encode($request->{'donations_info.baby_things'},JSON_UNESCAPED_UNICODE);
        $donations->Luxuries=json_encode($request->{'donations_info.luxuries'},JSON_UNESCAPED_UNICODE);
        $donations->accessories_and_mobiles=json_encode($request->{'donations_info.accessories_and_mobiles'},JSON_UNESCAPED_UNICODE);
        $donations->medical_devices=json_encode($request->{'donations_info.medical_devices'},JSON_UNESCAPED_UNICODE);
        $donations->miscellaneous=json_encode($request->{'donations_info.miscellaneous'},JSON_UNESCAPED_UNICODE);
         $donations->save();
        if (auth()->user()->donations())
            return response()->json([
            'success' => true,
            'data' => $donations->toArray()
        ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Data could not be added'
        ], 500);
    }
    public function receive_donation()
     {
        // $users = User::all();
        $donation=DB::table('list_donation')->latest('id')->get();
      return ($donation);
        
   //return Auth::user('id')->donations()->latest('id')->get()->toArray();
 

    //  $don= DB::table('list_donation')->latest('id')->get();

        //  $don =ListDonation::pluck('id'); 
    } 
    // public function user(Request $request)
    // {
    //     return response()->json($request->user());
    // }

}
