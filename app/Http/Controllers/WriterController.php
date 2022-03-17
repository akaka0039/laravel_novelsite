<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\novels;
use App\Models\novel_info;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use App\Http\Requests\NovelRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use NovelInfo;

class WriterController extends Controller
{

    //middlewareによる認証制限
    public function __construct()
    {
        $this->middleware('writer');
    }

    public function writer(Request $request)
    {
        $user_id = Auth::id();
        // ユーザが書いた小説を取得する
        $novels = DB::table('novels')
            ->where('user_id', $user_id)
            ->paginate(5);


        return view(
            'writer.index',
            compact('novels', 'user_id')
        );
    }



    public function add(Request $request)
    {

        $user_id = Auth::id();

        $novels = DB::table('novels')
            ->where('user_id', $user_id)
            ->where('novel_id', $request->novel_id)
            ->get();

        //小説情報が存在しなかった場合
        if ($novels->isEmpty()) {
            return redirect()->route('writer.index')->with([
                'message' => '小説の情報がありませんでした',
                'status' => 'alert',
            ]);
        }

        return view(
            'writer.add',
            compact('novels')
        );
    }

    // 小説を読む
    public function read($novel_id, $page)
    {

        $user_id = Auth::id();

        // ページ数がゼロの場合に「前に」押下時は、showに飛ばす
        if (empty($page)) {
            return redirect()->route('writer.show', ['id' => $novel_id]);
        }

        $novels = DB::table('novels')
            ->where('user_id', $user_id)
            ->where('novel_id', $novel_id)
            ->get();

        //小説情報が存在しなかった場合
        if ($novels->isEmpty()) {
            return redirect()->route('writer.index')->with([
                'message' => '小説の情報がありませんでした',
                'status' => 'alert',
            ]);
        }

        $novel_infos = DB::table('novel_infos')
            ->where('novel_id', $novel_id)
            ->where('page', $page)
            ->get();

        //episodeが存在しなかった場合
        if ($novel_infos->isEmpty()) {
            return redirect()->route('writer.index')->with([
                'message' => '先のエピソードがありませんでした',
                'status' => 'alert',
            ]);
        }

        return view(
            'writer.read',
            compact('novel_id', 'novels', 'novel_infos', 'page')
        );
    }

    public function editUpdate(Request $request)
    {
        // 編集
        try {
            DB::transaction(function ()  use ($request) {
                novels::where('novel_id', $request->novel_id)
                    ->update([
                        'novel_title' => $request->novel_title,
                        'novel_information' => $request->novel_information,
                    ]);

                novel_info::where('novel_id', $request->novel_id)
                    ->where('page', '=', $request->page)
                    ->update([
                        'episode' => $request->episode,
                    ]);
            });
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }


        return redirect()->route('writer.show', ['id' => $request->novel_id])->with([
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

        return redirect()->route('writer.show', ['id' => $request->novel_id])->with([
            'message' => $page + 1 . 'ページを追加投稿しました。',
            'status' => 'alert',
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Uesr  $User
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = Auth::id();

        $novels = DB::table('novels')
            ->where('user_id', $user_id)
            ->where('novel_id', $id)
            ->get();

        if ($novels->isEmpty()) {
            return redirect()->route('writer.index')->with([
                'message' => '小説の情報がありませんでした',
                'status' => 'alert',
            ]);
        }

        $novel_infos = DB::table('novel_infos')
            ->where('novel_id', $id)
            ->orderBy('page', 'asc')
            ->get();

        return view(
            'writer.show',
            compact('novels', 'novel_infos')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Uesr  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        $user_id = Auth::id();

        $novels = DB::table('novels')
            ->where('user_id', $user_id)
            ->where('novel_id', $request->novel_id)
            ->get();

        if ($novels->isEmpty()) {
            return redirect()->route('writer.index')->with([
                'message' => '小説の情報がありませんでした',
                'status' => 'alert',
            ]);
        }

        $novel_infos = DB::table('novel_infos')
            ->where('novel_id', $request->novel_id)
            ->where('page', $request->page)
            ->get();

        return view(
            'writer.edit',
            compact('novels', 'novel_infos')
        );
    }


    public function updatePage()
    {
        return view('writer.newCreate');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Uesr  $User
     * @return \Illuminate\Http\Response
     */
    // 新規投稿用
    public function update(NovelRequest $request, User $User)
    {

        $validated = $request->validated();
        $user_id = Auth::id();
        // 小説タイトルとエピソードの両方が存在していないといけないため、ここは
        // トランザクション処理が必要
        try {
            DB::transaction(function ()  use ($request, $user_id) {
                Novels::create([
                    'user_id' => $user_id,
                    'novel_title' => $request->novel_title,
                    'novel_information' => $request->novel_information,
                ]);

                $novel_id = novels::max('novel_id');

                novel_info::create([
                    'novel_id' => $novel_id,
                    'subtitle' => $request->subtitle,
                    'episode' => $request->episode,
                    'page' => 1,
                ]);
            });
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }

        return redirect()->route('writer.index')->with([
            'message' => '小説を新規投稿しました',
            'status' => 'alert',
        ]);
    }

    public function deletePage(Request $request)
    {
        $page = $request->page;

        try {
            novel_info::where('novel_id', $request->novel_id)
                ->where('page', '=', $request->page)
                ->delete();
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }


        return redirect()
            ->route('writer.show')
            ->with([
                'message' => $page . 'ページを削除しました。',
                'status' => 'alert'
            ]);
    }

    public function deleteUser(Request $request)
    {

        $user_id = Auth::id();
        $novels = novels::where('user_id', $user_id)
            ->get('novel_id');

        try {
            DB::transaction(function ()  use ($request, $user_id, $novels) {
                //他のDBにUserデータが存在していないかチェックする
                if (!is_null($novels)) {
                    novels::where('user_id', $user_id)
                        ->delete();

                    // ユーザは複数小説を保有できるため
                    foreach ($novels as $novel) {
                        novel_info::where('novel_id', $novel->novel_id)
                            ->delete();
                    }
                }

                User::where('user_id', $user_id)
                    ->delete();
            });
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }

        return redirect()
            ->route('user.index')
            ->with([
                'message' => 'ユーザを削除しました。',
                'status' => 'alert'
            ]);
    }

    public function deleteNovel(Request $request)
    {

        try {
            DB::transaction(function ()  use ($request) {
                // novel_idに関連する小説情報を全て削除する
                novel_info::where('novel_id', $request->novel_id)
                    ->delete();

                novels::where('novel_id', $request->novel_id)
                    ->delete();
            });
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }

        return redirect()
            ->route('writer.index')
            ->with([
                'message' => '小説を削除しました。',
                'status' => 'alert'
            ]);
    }
}
