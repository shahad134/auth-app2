<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\infoconnectt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; 

class infoconnects extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     */ public function store(Request $request)
    {
        //
        $user = Auth::user();
        $user->infoconnects()->create($request->all());
        return redirect()->route('infoconnect.create');
    }

    public function apistore(Request $request)
    {
       
        {
            $user = Auth::user()->id;
            $this->validate($request, [
                'info_connect.name'=> 'required',
                 'info_connect.numberphone'=> 'required',
                 'info_connect.birth_date'=> 'required',
                 'info_connect.time'=> 'required',

            ]);
            $infoconnect=new infoconnectt();
            $infoconnect->user_id=$user; 
          //  $infoconnect->user_id=$infoconnect;
            $infoconnect->name=$request->{'info_connect.name'};
             $infoconnect->numberphone=$request->{'info_connect.numberphone'};
             $infoconnect->birth_date=$request->{'info_connect.birth_date'};
             $infoconnect->time=$request->{'info_connect.time'};

            $infoconnect->save();
            if (auth()->user()->infoconnects())
                return response()->json([
                'success' => true,
                'data' => $infoconnect->toArray()
           
           
                ]);
            else
                return response()->json([
                    'success' => false,
                    'message' => '  Data could not be added'
            ], 500);
        // }
        }
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
