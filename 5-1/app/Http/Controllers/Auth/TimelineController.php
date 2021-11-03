<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use \App\sns;
use App\User;

class TimelineController extends Controller
{
    public function showTimelinePage()
    {
        $sns = sns::latest()->get(); 
        foreach($sns as $s)
        {
            $users = User::where('id',$s->user_id)
                            ->get();
            foreach($users as $user)
            {
                $snss[]=array(
                                'body'=>$s->body,
                                'name'=>$user->name,
                                'id'=> $s->id,
                                'user_id' => $user->id,
                                'sns_id' => $s->user_id,
                                'created_at' => $s->created_at,
                            );
             }
        }
        $auths = Auth::user();
        return view('auth.timeline', compact('snss','auths')); // resource/views/auth/timeline.blade.phpを表示する
    }
    
    public function postsns(Request $request) //ここはあとで実装します。(Requestはpostリクエストを取得するためのものです。)
    {
        $validator = $request->validate([ // これだけでバリデーションできるLaravelすごい！
            'body' => [ 'string', 'max:255'], // 必須・文字であること・280文字まで（ツイッターに合わせた）というバリデーションをします（ビューでも軽く説明します。）
        ]);
        sns::create([ // tweetテーブルに入れるよーっていう合図
            'user_id' => Auth::user()->id, // Auth::user()は、現在ログインしている人（つまりツイートしたユーザー）
            'body' => $request->tweet, // ツイート内容
        ]);
        return back(); // リクエスト送ったページに戻る（つまり、/timelineにリダイレクトする）
    }
    public function delete (Request $request)
        {
        sns::find($request->id)->delete();
        return back(); 
        }
}
