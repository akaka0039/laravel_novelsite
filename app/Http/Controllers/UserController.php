<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\novels;
use App\Models\novel_info;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use NovelInfo;

class UserController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 小説一覧を表示する
    public function index()
    {
        // $users = DB::table('user')
        //     ->paginate(5);

        $novels = DB::table('novels')
            ->paginate(5);

        return view(
            'user.index',
            compact('novels')
        );
    }

    // 小説詳細
    public function show($id)
    {
        $novels = DB::table('novels')
            ->where('novel_id', $id)
            ->get();

        if ($novels->isEmpty()) {
            return redirect()->route('user.index')->with([
                'message' => '小説がありませんでした',
                'status' => 'alert',
            ]);
        }

        $novel_infos = DB::table('novel_infos')
            ->where('novel_id', $id)
            ->orderBy('page', 'asc')
            ->get();

        return view(
            'user.show',
            compact('novels', 'novel_infos')
        );
    }

    // 小説を読む
    public function read($novel_id, $page)
    {
        // ページ数がゼロの場合に「前に」押下時は、showに飛ばす
        if (empty($page)) {
            return redirect()->route('user.show', ['id' => $novel_id]);
        }

        $novels = DB::table('novels')
            ->where('novel_id', $novel_id)
            ->get();

        // 問題！！！！
        $novel_infos = DB::table('novel_infos')
            ->where('novel_id', $novel_id)
            ->where('page', $page)
            ->get();

        //episodeが存在しなかった場合
        if ($novel_infos->isEmpty()) {
            return redirect()->route('user.index')->with([
                'message' => '先のエピソードがありませんでした',
                'status' => 'alert',
            ]);
        }

        return view(
            'user.read',
            compact('novel_id', 'novels', 'novel_infos', 'page')
        );
    }

    public function editUpdate(Request $request)
    {
        // 編集
        novel::where('novel_id', $request->novel_id)
            ->update([
                'novel_title' => $request->novel_title,
                'novel_information' => $request->information,
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

        //最大ページ数を取得
        $page = DB::table('novel_infos')
            ->where('novel_id', $request->novel_id)
            ->orderBy('page', 'desc')
            ->value('page');

        novel_info::create([
            'novel_id' => $request->novel_id,
            'subtitle' => $request->subtitle,
            'episode' => $request->episode,
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
            'novel_information' => $request->information,
        ]);

        $novel_id = novel::max('novel_id');
        novel_info::create([
            'novel_id' => $novel_id,
            'subtitle' => $request->subtitle,
            'episode' => $request->sentence,
            'page' => 1,
        ]);

        return redirect()->route('write');
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
        if (!is_null($novel_id)) {
            novels::where('user_id', $request->user_id)
                ->delete();

            novel_info::where('novel_id', $request->novel_id)
                ->delete();
        }

        return redirect()
            ->route('index')
            ->with([
                'message' => 'ユーザを削除しました。',
                'status' => 'alert'
            ]);
    }

    public function deleteNovel(Request $request)
    {

        // novel_idに関連する小説情報を全て削除する
        novel_info::where('novel_id', $request->novel_id)
            ->delete();

        novels::where('novel_id', $request->novel_id)
            ->delete();

        return redirect()
            ->route('write')
            ->with([
                'message' => '小説を削除しました。',
                'status' => 'alert'
            ]);
    }
}
