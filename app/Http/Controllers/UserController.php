<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\novel;
use App\Models\novel_info;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use NovelInfo;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $id = User::get(['id']);

        $novels = DB::table('novels')
            ->paginate(5);



        //dd($users);


        return view(
            'app2',
            compact('id', 'novels')
        );
    }

    public function write(Request $request)
    {

        // ユーザが書いた小説を取得する
        $novel_id = DB::table('novels')
            ->where('id', Auth::id())
            ->get();

        // 重複したデータを削除する
        $novels = $novel_id->unique('novel_id');

        // ->groupBy('user_id')
        // ->having('user_id', '=', Auth::id())
        // ->get();



        return view(
            'writer',
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
        // 新規投稿用
        $id = Auth::id();
        $novel_id = novel::max('novel_id') + 1;

        Novel::create([
            'id' => $id,
            'novel_id' => $novel_id,
            'novel_title' => $request->novel_title,
            'information' => $request->information,
        ]);

        novel_info::create([
            'novel_id' => $novel_id,
            'sentence' => $request->sentence,
            'page' => 1,
        ]);

        $novels = DB::table('novels')->get();

        return redirect()->route('write')->with(compact('novels'));
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
