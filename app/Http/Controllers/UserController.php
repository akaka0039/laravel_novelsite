<?php

namespace App\Http\Controllers;

use App\Models\Uesr;
use App\Models\novel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $novels = DB::table('novels')->get();

        //dd($users);

        return view(
            'app2',
            compact('novels')
        );
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
     * @param  \App\Models\Uesr  $uesr
     * @return \Illuminate\Http\Response
     */
    public function show(Uesr $uesr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Uesr  $uesr
     * @return \Illuminate\Http\Response
     */
    public function edit(Uesr $uesr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Uesr  $uesr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Uesr $uesr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Uesr  $uesr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Uesr $uesr)
    {
        //
    }
}
