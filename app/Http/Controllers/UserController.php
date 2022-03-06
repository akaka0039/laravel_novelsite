<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $novels = DB::table('novels')
            ->paginate(5);


        //dd($users);

        return view(
            'app2',
            compact('novels')
        );
    }

    public function write()
    {


        //dd($users);

        return view(
            'writer',
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
     * @param  \App\Models\Uesr  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Uesr  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Uesr  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {

        $novel = Auth::id();
        // var_dump($novel);
        // dd($novel);

        // Novel::create([
        //     'novel_id' => $novel,
        //     'novel_title' => $request->novel_title,
        //     'information' => $request->information,
        //     'sentence' => $request->sentence,
        // ]);

        $novels = DB::table('novels')->get();

        return redirect()->route('index')->with(compact('novels'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Uesr  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
        //
    }
}
