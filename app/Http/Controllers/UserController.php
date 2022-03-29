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
}
