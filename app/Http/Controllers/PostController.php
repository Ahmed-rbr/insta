<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
    

    public function __construct()
    {
        $this->middleware(middleware: 'auth');
        
    }


    public function index():View{
$posts=Post::with(relations:"user")->latest()->get();
return view(view: 'post.index',data: compact(var_name:'posts'));

    }

public function create():View{
    return view(view:'posts.create');
}

public function store(Request $request): RedirectResponse{

$data=$request->validate(rules:[
    'caption'=>'required',
'image'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048'
]);

$imagePath=$request->file(key:'image')->store(path: 'uploads',options:'public');
auth()->user()->posts()->create(attribute: [
    'caption'=>$data['caption'],
    'image_path'=>$imagePath,
]);

return redirect(to: '/profile/' . auth()->user()->id);

}

public function show(Post $post): View{

    return view(view: 'post.show',data: compact(var_name:'post'));

}

public function edit(Post $post): View{

    if(auth()->id()!==$post->user_id){

        abort(code:403,message:'Unauthorized action.');
    }

        return view(view: 'post.edit',data: compact(var_name:'post'));
}

public function update(Request $request, Post $post): RedirectResponse
 { if(auth()->id()!==$post->user_id){

        abort(code:403,message:'Unauthorized action.');
    }
    $data=$request->validate(rules:[
        'caption'=>'required'
    ]);
$post->update(attributes: $data);
return redirect(to: '/posts/' . $post->id);


    }

    public function destroy(Post $post): RedirectResponse
 { if(auth()->id()!==$post->user_id){

        abort(code:403,message:'Unauthorized action.');
    }

Storage::disk(name:'public')->delete(paths:$post->image_path);
$post->delete();

return redirect(to: '/profile/' . auth()->user()->id);

}
}