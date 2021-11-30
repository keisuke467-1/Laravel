<?php
// ○namespace:
// …このファイルがあるディレクトリの位置を示す
// 	（Javaのパッケージ名と同じ）
namespace App\Http\Controllers;

// ○use：
// …他の言語のimportと同じ
// 	(Requestを使うと言う意味)
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Support\Facades\DB;
use App\Person;

// ○最後の文：
// …コントローラを継承したハローコントローラクラス
// 	（javaと同じ解釈）
// ※コントローラ名を付ける時は○○コントローラの形にする
// class HelloController extends Controller
// {
//     public function index(){
//         return <<<EOF
//         <html>
//         <head>
//             <title>Hello/Index</title>
//             <style>
//                 body {font-size:16pt; color:#999; }
//                 h1 { font-size:100pt; text-align:right; color:#eee; 
//                     margin:-40px 0px -50px 0px; }
//             </style>
//         </head>
//         <body>
//             <h1>index</h1>
//             <p>これは、Helloコントローラのindexアクションです。</p>
//         </body>
//         </html>
//         EOF;
//     }
// }

// use App\Http\Controllers\Controller;

global $head, $style, $body, $end;
$head = '<html><head>';
$style = <<<EOF
<style>
body { font-size:16pt; color:#999; }
h1 { font-size:100pt; text-align:right; color:#eee;
    margin:-40px 0px -50px 0px; }
</style>
EOF;
$body = '</head><body>';
$end = '</body></html>';

function tag($tag,$txt) {
    return "<{$tag}>" . $txt . "</{$tag}>";
}

class HelloController extends Controller
{
    //web.phpから呼び出されたindexの中身をブラウザへ出力

    //index()に引数を渡してルートパラメータを使うindex($id='noname', $pass='unknown'){~}
                        //↓
    // helloの後のURLに記述されたルートパラメータを反映させる
    // <li>ID: {$id}</li>
    // <li>PASS: ($pass}</li>
     // 複数のアクションを追加
    // public function index(){
    //     global $head, $style, $body, $end;

    //     $html = $head . tag('title', 'Hello/Index') . $style 
    //     .$body 
    //     . tag('h1','Index') . tag('p', 'this is Index page') 
    //     .'<a href="/hello/other">go to Other page </a>'
    //     .$end;
    //     return $html; 
    // }

    // public function other(){
    //     global $head, $style, $body, $end;

    //     $html = $head . tag('title', 'Hello/Other') . $style 
    //     .$body 
    //     . tag('h1','Other') . tag('p', 'this is Other page') 
    //     .$end;
    //     return $html; 
    // }
    

    // Request $request この書き方はJavaで言うレスポンス型のインスタンスのようなもの
    // public function index(Request $request, Response $response){
    //     $html = <<<EOF
    //     <html>
    //     <hrad>
    //     <title>Hello/Index</title>
    //     <style>
    //         body {font-size:16pt; color:#999; }
    //         h1 { font-size:120pt; text-align:right; color:#fafafa; 
    //         margin:-50px 0px -120px 0px; }
    //     </style>
    //     </head>
    //     <body>
    //         <h1>Hello</h1>
    //         <h3>Request</h3>
    //         <pre>{$request}</pre>
    //         <h3>Response</h3>
    //         <pre>{$response}</pre>
    //     </body>
    //     </html>
    //     EOF;

    //     $response->setContent($html);
    //     return $response;
    // }

        // public function index($id='zero')
        // {
        //     $data = [
        //         'msg'=>' これはコントローラから渡されたメッセージです。',
        //         'id'=>$id
        //     ];
        //     return view('hello.index',$data);
        // }

        // public function index(Request $request)
        // {
        //     $data = [
        //         'msg'=>' これはコントローラから渡されたメッセージです。',
        //         'id'=>$request->id
        //     ];
        //     return view('hello.index',$data);
        // }

        // public function index()
        // {
        //     $data = [
        //         'msg'=>' これはBladeを利用したサンプルです。',
        //     ];
        //     return view('hello.index',$data);
        // }

        // public function index()
        // {
        //     $data = [
        //         'msg'=>'お名前を入力してください。',
        //     ];
        //     return view('hello.index',$data);
        // }

        // public function post(Request $request) 
        // {
        //     $msg = $request->msg;

        // $data = [
        //     'msg'=>'こんにちは、' . $msg . 'さん！'
        // ];
        // return view('hello.index', $data);
        // }

        // // リスト3-18
        // // ～index()←Getでアクセス(web.phpで設定した)
        // public function index()
        // {
        //     // ['msg'=>'']←index.blade.phpに渡す連想配列
        //     // $msgに''(空白)を代入する
        //     // …空白を代入する と書かないと
        //     // $msgが未定義でエラーになる
        //     return view('hello.index',['msg'=>'']);
        // }

        // public function post(Request $request)
        // {
        //     // ['msg'=>$request->msg]
        //     // …(p.72)フォームから送信(postリクエスト)に入っているmsg
        //     return view('hello.index',['msg'=>$request->msg]);
        // }

        // リスト3-22
        // public function index(Request $request)
        // {
            
        //     return view('hello.index',['data'=>$request->data]);
        // }

        public function index(Request $request)
        {
            $sort = $request->sort;
            $items = Person::orderBy($sort,'asc')->Paginate(5);
            $param = ['items' => $items, 'sort' => $sort];
            return view('hello.index',$param);
        }

        public function post(Request $request)
        {
            $items = DB::select('select * from people');
            return view('hello.index',['items' => $items]);
        }

        public function add(Request $request)
        {
            return view('hello.add');
        }

        public function create(Request $request)
        {
            //このcreateアクションはデータベースに仕事をするだけ
            $param = [
                'name' => $request->name,
                'mail' => $request->mail,
                'age' => $request->age,
            ];
            DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
            //ここのreturnはViewではなくリダイレクトになっている
            return redirect('/hello');
        }

        public function edit(Request $request)
        {
            $param = ['id' => $request->id];
            $item = DB::select('select * from people where id = :id',$param);
            return view('hello.edit', ['form' => $item[0]]);
        }

        public function updata(Request $request)
        {
            $param = [
                'id' => $request->id,
                'name' => $request->name,
                'mail' => $request->mail,
                'age' => $request->age,
            ];
            DB::updata('updata people set name =:name, mail = :mail, age = :age where id = :id', $param);
            return redirect('/hello');
        }

        public function show(Request $request){
            $id = $request -> id;
            $items = DB::table('people') -> where('id','<=', $id) -> get();
            return view('hello.show', ['items' => $items]);
        }

        public function ses_get(Request $request)
        {
            $sesdata = $request->session()->get('msg');
            return view('hello.session',['session_data' => $sesdata]);
        }

        public function ses_put(Request $request)
        {
            $msg = $request->input;
            $request->session()->put('msg',$msg);
            return redirect('hello/session');
        }
}