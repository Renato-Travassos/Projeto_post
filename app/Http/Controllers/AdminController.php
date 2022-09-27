<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Adminrequest;
use App\Models\{Post,Admin,User};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\{File,DB};
 
 

class AdminController extends Controller
{
    protected $fillable=['public_path'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         
    if (isset($_GET['query']) && strlen($_GET['query'])>2) {
        $pesquisa_texto=$_GET['query'];
        $posts=DB::table('posts')->where('nome','like','%'.$pesquisa_texto.'%')->paginate(4);
        $posts->appends($request->all());
         
        return view('admin.posts ',compact('posts'));
       }else {             
        return view('admin.posts ',[
            'posts' => DB::table('posts')->paginate(4)
        ,'image'=>DB::table('image')]);
    }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function table(Request $request )
     {
        $users = User::select("*")
                        ->whereNotNull('last_seen')
                        ->orderBy('last_seen', 'DESC')
                        ->paginate(10);
          
        return view('admin.tabela', compact('users' ));

     }

     public function sobre(Request $request,$id)
     {
        $user = DB::table('users')->where('id', $id)->first();    
        $post=DB::table('posts')->where('user_id',$id)->get(); 
        return view('user',compact('post','user'));
     }


      




    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Adminrequest $request)
    {    
        $user=new Admin();
        $user->name=$request->name;
        $user->password=$request->password;
        $user->is_admin=$request->is_admin;
        $user->email=$request->email;
        $user->save();  
        return back()->with('sucesso',"Administrador criado com sucesso");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {    
        $user = DB::table('users')->where('id', $id)->first();
        return view('admin.ver', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(  $id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $action=route('admin.update',$user->id);
        return view('admin.edit', compact('user','action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Adminrequest $request, $id)
    {     
        $user=User::find($id);
        DB::beginTransaction();
        $user->update($request->all());
        DB::Commit(); 
        return redirect()->route('admin.tabela')->with('sucesso',"usúario editado"); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
       
     
     {      
               DB::table('posts')->where('user_id', $id)->delete();   
              DB::table('users')->where('id', $id)->delete();     
            return back()->with('deletado',"usúario deletado");      
    }
    public function dashboard(){
        $user=auth()->user();
        $post=$user->post;
        $filmeasalg=$user->filmeasalg;
        return view('admin.dashboard',compact('post','filmeasalg'));
    } 
     
}
