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
        $novels = DB::table('novels')
            ->paginate(5);

        return view(
            'app2',
            compact('novels')
        );
    }

    public function write(Request $request)
    {
        $user_id = Auth::id();

        // ユーザが書いた小説を取得する
        $novels = DB::table('novels')
            ->where('user_id', $user_id)
            ->paginate(5);

        return view(
            'writer',
            compact('novels', 'user_id')
        );
    }

    public function add(Request $request)
    {

        $novels = DB::table('novels')
            ->where('novel_id', $request->novel_id)
            ->get();

        return view(
            'add',
            compact('novels')
        );
    }

    // 小説を読む
    public function read($id)
    {
        $novel_id = $id;

        $novels = DB::table('novels')
            ->where('novel_id', $id)
            ->get();
        $novel_infos = DB::table('novel_infos')
            ->where('novel_id', $id)
            ->paginate(1);
        return view(
            'read',
            compact('novel_id', 'novels', 'novel_infos')
        );
    }

    public function editUpdate(Request $request)
    {
        // 編集
        novel::where('novel_id', $request->novel_id)
            ->update([
                'novel_title' => $request->novel_title,
                'information' => $request->information,
            ]);

        novel_info::where('novel_id', $request->novel_id)
            ->where('page', '=', $request->page)
            ->update([
                'sentence' => $request->sentence,
            ]);

        return redirect()->route('write')->with([
            'message' => $request->page . 'ページを編集しました。',
            'status' => 'alert',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 追加投稿
    public function create(Request $request)
    {


        $page = novel_info::max('page');

        novel_info::create([
            'novel_id' => $request->novel_id,
            'sentence' => $request->sentence,
            'page' => $page + 1,
        ]);

        return redirect()->route('write')->with([
            'message' => $page + 1 . 'ページに追加投稿しました。',
            'status' => 'alert',
        ]);
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
    public function show($id)
    {

        $novels = DB::table('novels')
            ->where('novel_id', $id)
            ->get();

        $novel_infos = DB::table('novel_infos')
            ->where('novel_id', $id)
            ->orderBy('page', 'asc')
            ->get();

        return view(
            'show',
            compact('novels', 'novel_infos')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Uesr  $User
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $novels = DB::table('novels')
            ->where('novel_id', $id)
            ->get();

        $novel_infos = DB::table('novel_infos')
            ->where('novel_id', $id)
            ->paginate(1);

        return view(
            'edit',
            compact('novels', 'novel_infos')
        );
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
        $user_id = Auth::id();

        Novel::create([
            'user_id' => $user_id,
            'novel_title' => $request->novel_title,
            'information' => $request->information,
        ]);

        $novel_id = novel::max('novel_id');
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


    public function deletePage(Request $request)
    {

        $page = $request->page;

        novel_info::where('novel_id', $request->novel_id)
            ->where('page', '=', $request->page)
            ->delete();

        return redirect()
            ->route('write')
            ->with([
                'message' => $page . 'ページを削除しました。',
                'status' => 'alert'
            ]);
    }

    public function deleteUser(Request $request)
    {

        User::where('user_id', $request->user_id)
            ->delete();

        $novel_id = novel::where('user_id', $request->user_id)
            ->get('novel_id');

        //他のDBにUserデータが存在していないかチェックする
        if (is_null($novel_id)) {
            dd($novel_id);
        } else {
            dd("失敗");
        }

        novel::where('user_id', $request->user_id)
            ->delete();


        return redirect()
            ->route('app2')
            ->with([
                'message' => 'ユーザを削除しました。',
                'status' => 'alert'
            ]);
    }
}
