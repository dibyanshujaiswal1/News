<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function CreateArticle(){
        return view('backend.article.createarticle');
    }
    public function StoreArticle(Request $request){
        $request->validate([
            'title'=>'required',
            'auther_name'=>'required',
            'image'=>'required',
            'description'=>'required',
            'date'=>'required'
        ]);
        $filename = $request->file('image');
        $file = time() . '-' . 'article' . '.' . $filename->getClientOriginalExtension();
        $destination = public_path('backend/img/article/');
        $filename->move($destination, $file);
        $var=Article::insert([
            'title'=>$request->title,
            'image' => $file,
            'auther_name'=>$request->auther_name,
            'description'=>$request->description,
            'date'=>$request->date,
            'is_features'=>$request->is_features,
            'created_at'=>Carbon::now()
        ]);
        return redirect()->back()->with('message','Article added successfully!!');
    }
    public function ViewArticle(){
        $getallarticle = Article::orderby('id', 'desc')->get();
        return view('backend.article.viewarticle', compact('getallarticle'));
    }
    public function changeArticleStatus(Request $request)
    {
        $articles = Article::find($request->articlestatus_id);
        $articles->status = $request->status;
        $articles->save();
        return response()->json(['success'=>'User status change successfully.']);
}
public function EditArticle($id){
    $data = Article::find($id);
    return view('backend.article.editarticle', ['data' => $data]);
}
public function UpdateArticle(Request $request, $id)
{
    $data = Article::find($id);
    if ($request->file('image')) {
        $filename = $request->file('image');
        $file = time() . '-' . 'article' . '.' . $filename->getClientOriginalExtension();
        $destination = public_path('backend/img/article/');
        $filename->move($destination, $file);
        $data->image = $file ?  $data->image = $file : '';
    }
    $data->title = $request->title;
    $data->auther_name=$request->auther_name;
    $data->description = $request->description;
    $data->is_features=$request->is_features;
    $data->date=$request->date;
    $data->save();
    return  redirect('/admin/view-article');
}
public function DeleteArticle($id){
    $data=Article::find($id);
    $data->delete();
    return redirect('/admin/view-article');
}
public function Articledetails($id){
    $articlesdetails=Article::find($id);
    return view('backend.article.articledetails',compact('articlesdetails'));
}
}