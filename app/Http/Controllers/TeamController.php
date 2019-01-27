<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Team;
class TeamController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Team::select('name','image')->get();
        return view('team.index')->with(['data'=>$data]);
    }
    /**
	 * Display Form
     */
    public function addNew()
    {
        return view('team.form');
    }
    /**
     * Add New Team Member
     */
    public function addTeam(Request $request){
         $this->validate($request,[
         'names.*'=>'required|string|max:25',
         'images.*' => 'image|mimes:png,jpg,jpeg|dimensions:min_width=375,min_height=446'
        ]);
        $name=$_REQUEST['names'];
        for($i=0;$i<sizeof($name);$i++){
         $last_id = Team::create(['name'=>$name[$i]]);
            if ($request->hasFile('images')){
              $file = $request->file('images');
              $destinationPath = public_path('/team');
                if(isset($file[$i]) && $file[$i]!=''){
                  $image_name=time().'_'.$file[$i]->getClientOriginalName();
                  $file[$i]->move($destinationPath,$image_name);
                }else{
                  $image_name='';
                }
            }else{
              $image_name='';
            }
           
            
           Team::where('id',$last_id->id)->update(['image'=>$image_name]);
        }
         return redirect('team')->with('message', 'Successfully Added');
       }
    
}
