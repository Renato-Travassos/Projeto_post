<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Postrequest;
use App\Models\{Post,User};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\{DB,File};
 
 

class PostController extends Controller
{
    protected $fillable=['public_path'];
    public function index(Request $request)
    {
        if (isset($_GET['query']) && strlen($_GET['query'])>2) {
            $pesquisa_texto=$_GET['query'];
            $posts=DB::table('posts')->where('nome','like','%'.$pesquisa_texto.'%')->paginate(4);
            $posts->appends($request->all());
             
            return view('Post_user.posts ',compact('posts'));
           }else {             
            return view('Post_user.posts ',[
                'posts' => DB::table('posts')->paginate(4)
            ,'image'=>DB::table('image')]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        
        $action=route( 'posts.store');
        return view('Post_user.form',compact('action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Postrequest $request)
     {                 
        DB::beginTransaction();        
        $post=new Post(); 
        $post->nome=$request->nome;
        $post->nota=$request->nota;
        $post->comentário=$request->comentário;
        $post->tipos=$request->tipos;
        $post->descrição=$request->descrição;
        $user=auth()->user();
        $post->user_id=$user->id;
         
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage=$request->image;
            
            $extension=$requestImage->extension();     
            
            $imageName=md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            
            $request->image->move(public_path('img/posts'),$imageName); 
            
            $post->image=$imageName; 
            } 
        $post->save();    
        DB::Commit();   
         return back()->with('sucesso',"post adicionado com  sucesso");
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {    
        $post=Post::find($id);
        $pubOwner=User::where('id',$post->user_id)->first()->toArray();
        return view('Post_user.show',compact('post','pubOwner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {     // $user=User::find($id);
         $post=Post::find($id);
         $action=route('posts.update',$post->id);
         return view('Post_user.form',compact('post','action'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Postrequest $request,$id )
    {   
        $post=Post::find($id);
        DB::beginTransaction();     
        $data=$request->all();
        $destino='img/posts/'.$post->image;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if (File::exists($destino)) 
        {
            File::delete($destino);
        }
            $requestImage=$request->image;
            
            $extension=$requestImage->extension();     
            
            $imageName=md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            
            $request->image->move(public_path('img/posts'),$imageName); 
            
            $data['image']=$imageName; 

            
              }
            $post->update($data);
          DB::Commit();  
        return back()->with('sucesso',"post $request->nome editado com sucesso");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        DB::beginTransaction(); 
        $post=Post::find($id);
        //Post::find($id)->delete();
        $destino='img/posts/'.$post->image;
        if (File::exists($destino)) 
        {
            File::delete($destino);
        }
        $post->delete();
        DB::Commit();  
        return back()->with('deletado',"deletado com sucesso ");       
    }
    public function dashboard(){
        $user=auth()->user();
        $post=$user->post;
        $filmeasalg=$user->filmeasalg;
        return view('user',compact('post','filmeasalg'));
    } 
   public function view_user($id){         
        $user = DB::table('users')->where('id', $id)->first();    
        $post=DB::table('posts')->where('user_id',$id)->get();
       return view('view_user', compact('user','post'));
   }
    
    
}
