<?php

namespace App\Http\Controllers;

use App\Models\novels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function read(Request $request, $novel_id, $page)
    {

        // ページ数がゼロの場合に「前に」押下時は、showに飛ばす
        // if (empty($page)) {
        //     return redirect()->route('user.show', [$request->novel_id])->with([
        //         'message' => '小説がありませんでした',
        //         'status' => 'alert',
        //     ]);
        // }

        // バリエーション必要

        $novels = DB::table('novels')
            ->where('novel_id', $novel_id)
            ->get();

        // 0・・・前のページ
        // 1・・・次のページ
        // それ以外・・・現状維持
        if ($request->page_read === "0") {
            // 前のページ
            $novel_infos = DB::table('novel_infos')
                ->where('novel_id', $novel_id)
                ->where('page', '<', $page)
                ->orderBy('page', 'desc')
                ->first();

            // データが取得できなかった＝一個前が0ページだった場合
            if (is_null($novel_infos)) {
                return redirect()->route('user.show', [$novel_id]);
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


    public function search(Request $request, $user_request)
    {

        // 運営者のおすすめ
        if ($user_request == "1") {
            $novels = DB::table('novels')
                ->whereIn('novel_id', [1, 2, 4])
                ->paginate(5);

            $message_search = "運営者のおすすめ";
        }
        //  評価の高い順 
        else if ($user_request == "2") {

            $novels = DB::table('novels')
                // 評価の高い順で降順（good_pointが多い小説がトップで表示されることになる）
                ->orderBy('good_point', 'desc')
                ->paginate(5);

            $message_search = "評価の高い";
        }
        //  最新の投稿順 
        else if ($user_request == "3") {
            // dd($user_request);
            $novels = DB::table('novels')
                ->orderBy('updated_at', 'desc')
                ->orderBy('created_at', 'desc')
                ->paginate(5);

            $message_search = "最新の投稿";
        }
        //  ユーザが入力をした場合
        else if ($user_request == "4") {

            $keyword = $request->input('keyword');
            $query = novels::query();

            if (!empty($keyword)) {
                $query->where('novel_title', 'LIKE', "%{$keyword}%")
                    ->orWhere('novel_information', 'LIKE', "%{$keyword}%");
            }

            $novels = $query->orderByRaw('updated_at - created_at DESC')
                ->paginate(5);
            $message_search = $keyword;
        }
        // ランダム 
        else {
            $novels = DB::table('novels')
                ->inRandomOrder()
                ->paginate(5);

            $message_search = "ランダム";
        }


        // ビューにusersとsearchを変数として渡す
        return view(
            'user.search',
            compact('novels', 'message_search')
        );
    }
}
