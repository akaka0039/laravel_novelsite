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
    public function read(Request $request, $novel_id, $page)
    {

        $user_id = Auth::id();

        // ページ数がゼロの場合に「前に」押下時は、showに飛ばす
        // バリエーション必要



        $novels = DB::table('novels')
            ->where('novel_id', $novel_id)
            ->get();

        // 0・・・前のページ
        // 1・・・次のページ
        // 2・・・現状維持

        if ($request->page_read === "0") {
            // 前のページ
            $novel_infos = DB::table('novel_infos')
                ->where('novel_id', $novel_id)
                ->where('page', '<', $page)
                ->orderBy('page', 'desc')
                ->first();

            // データが取得できなかった＝一個前が0ページだった場合
            if (is_null($novel_infos)) {
                return redirect()->route('writer.show', [$novel_id]);
            }
        } else if ($request->page_read === "1") {
            // 次のページ
            $novel_infos = DB::table('novel_infos')
                ->where('novel_id', $novel_id)
                ->where('page', '>', $page)
                ->orderBy('page', 'asc')
                ->first();
        } else {
            // 現状維持
            $novel_infos = DB::table('novel_infos')
                ->where('novel_id', $novel_id)
                ->where('page', $page)
                ->first();
        }


        //episodeが存在しなかった場合
        if (is_null($novel_infos)) {
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
            'message' => $request->page . 'ページ目を編集しました。',
            'status' => 'info',
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

        $request->validate([
            'subtitle' => ['required', 'string', 'max:100'],
            'episode' => ['required', 'string', 'max:15000'],
        ]);

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
            'message' => '新規ページを追加投稿しました。',
            'status' => 'info',
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
            ->paginate(10);

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
            'status' => 'info',
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
            ->route('writer.show', ['id' => $request->novel_id])
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
