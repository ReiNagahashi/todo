<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
//？？？ここのsessionはどんな意味だっけか？？？
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateTodoRequest;

class TodosController extends Controller
{

    //ここにmiddlewareを使ったのはhome以外にもtodo new-todoにログインページに移る処理を適用させたかったから 
        /**
     * Create a new controller instance.
     *
    //  * @return void
     */
    // public function __construct()
    // {
    //     //ここでexceptを使うと、その指定したページだけがログインフォームに映らないようにできる また、これらのmiddleware をweb.phpで同じように処理することがdケイル
    //     $this->middleware('auth')->except(['index','show']);
    // }
    public function index(){
        //!!!???こ子にあるTodoはモデルのことを指すのか？？？
        $todos = Todo::all();
        //↓↓↓indexはブラウザ上に表示させるメソッドであり、それをviewによって場所を選択して、それに伴う情報をwithで選択する
        return view('ToDo.index')->with('todos',$todos);
    }

public function create(){
    return view('ToDo.create');
}

public function store(CreateTodoRequest $request){

    //Validation 　💫記入必須の設定にする
    // $this->validate($request,[
    //     'title' => 'required',
    //     'description' => 'required'
    // ]);

    //Store into database
        $todo = new Todo;
        //ここのrequestはユーザーが記入する・つまりユーザーが要求した情報がそれぞれtitle、descriptionになっているんだね
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->save();

            //session success message
        Session::flash('success','Todo Created Successfully');
    //redirect back 
    return redirect('/todos');
    //最後に/todosに戻るよって言う命令をここでしている！
}

public function show(Todo $todo){
    return view('ToDo.show')->with('todo',$todo);
}

public function edit(Todo $todo){
    //Route model Binding ここでルーティングをする際にもidではなくここだったらtodo($抜き)を置く
    // $todo = Todo::find($id);
     return view('ToDo.edit')->with('todo',$todo);
}

//ここも$todoに変えられるので注意
public function update(CreateTodoRequest $request,Todo $todo){
    // $this->validate($request,[
    //     'title' => 'required',
    //     'description' => 'required'
    // ]);

    // $todo = Todo::find($id);
    $todo->title = $request->title;
    $todo->description = $request->description;
    $todo->save();

        //ここも成功メッセージい
    Session::flash('success','Todo Update Successfully');
    return redirect('/todos');
}

//destroyって名前は自分で自由に名前がつけられる。つまり、そのメソッドが実行されるとデータメソッドであるdestroyが使えるようにすれば良い
    public function destroy(Todo $todo){
        // $todo = Todo::find($id);
        $todo->delete();
        Session::flash('success','Todo Delete Successfully');
        return redirect('/todos');
        //redirectを使うのは、デリートをする場所は同じだから、他ページに移る必要はないから

    }
    public function complete(Todo $todo){
        // $todo = Todo::find($id);
        //ここでのtrueは１を意味している
        $todo->complete = true;
        $todo->save();

        Session::flash('success','Todo complete Successfully');
        return redirect()->back();
    }
    public function not_complete(Todo $todo){
        // $todo = Todo::find($id);
        //ここでのtrueは１を意味している
        $todo->complete = false;
        $todo->save();

        Session::flash('success','Todo pending');
        return redirect()->back();
    }
}
