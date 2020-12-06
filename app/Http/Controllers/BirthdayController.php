<?php

namespace App\Http\Controllers;
use App\Birthday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BirthdayController extends Controller
{
    public function index() {
        // ユーザーごとのデータの取り出し
        $datas = Birthday::where('user_id', Auth::user()->id)->get();
        //indexビューへの表示
        return view('birthdays.index', compact('datas'));

        // ログインしていたら、indexブレードを表示
        if (Auth::check()) {
            return view('birthdays.index');
        } else {
            // ログインしていなかったら、Login画面を表示
            return view('auth/login');
        }
    }

    public function store(Request $request)
    {
        // バリデーション
        $this->validate(
        $request,
            [
                'name' => 'required|string',
                'birthday' => 'required|date_format:Ymd',
            ],
            [
                'name.required' => '文字を入力してください',
                'birthday.required' => 'フォーマット通りに入力してください',
            ]
        );

        // フォームから送られてきたデータを保存する
       Birthday::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'birthday' => $request->birthday,
            'info' => $request->info,
        ]);

        $user = Auth::user();
        // 同じ画面にリダイレクト
        return redirect()->route('birthdays.index',$user); 
    }

    //詳細を見る
    public function show($id) {
        $birthdays = Birthday::find($id);
        // 詳細ページへ
        return view('birthdays.show', ['birthdays' => $birthdays]);
    }

    public function edit($id) 
    {
        $birthdays = Birthday::find($id);
        if (auth()->user()->id != $birthdays->user_id) 
        {
            return redirect(route('birthdays.index'))->with('error', '許可されていない操作です');
        }
        return view('birthdays.edit', ['birthdays' => $birthdays]);
    }

    public function update(Request $request, $id)
    {
        // バリデーション
        $this->validate(
            $request,
                [
                    'name' => 'required|string',
                    'birthday' => 'required|date_format:Ymd',
                ],
                [
                    'name.required' => '文字を入力してください',
                    'birthday.required' => 'フォーマット通りに入力してください',
                ]
            );

        $birthdays = Birthday::find($id);
        if (auth()->user()->id != $birthdays->user_id) {
            return redirect(route('birthdays.index'))->with('error', '許可されていない操作です');
        }

        // 更新処理
        $birthdays->update([
            'name' => $request->name,
            'birthday' => $request->birthday,
            'info' => $request->info,
        ]);
        return redirect()->route('birthdays.show' , $id);
    }

    //削除
    public function destroy($id){
        $birthdays = Birthday::find($id);
        $birthdays->delete();
        return redirect()->route('birthdays.index'); 
    }
}

