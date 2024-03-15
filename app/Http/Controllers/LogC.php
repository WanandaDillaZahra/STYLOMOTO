<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LogM;
use Illuminate\Support\Facades\Auth;

class LogC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Melihat Halaman Log'
        ]);
        
        $title = "Daftar Aktivitas";
        $logM = LogM::select('users.*', 'log.*')
        ->join('users', 'users.id', '=', 'log.id_user')
        ->orderBy('log.created_at', 'desc')->get();

        return view('log', compact('title','logM'));
    }

    public function filter1(Request $request)
    {
        $title = "Filter Log Activity";
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        $logM = LogM::select('users.*', 'log.*')
        ->join('users', 'users.id', '=', 'log.id_user')
        ->whereBetween('log.created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
        ->orderBy('log.created_at', 'desc')
        ->get();

        return view('log', compact('title', 'logM', 'startDate', 'endDate'));
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
