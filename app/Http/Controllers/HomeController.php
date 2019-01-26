<?php

namespace App\Http\Controllers;

use App\Level;
use App\Nominee;
use App\NomineeToken;
use App\Position;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
        $loggedInUser  = NomineeToken::with('department','voting')
            ->where('id',Auth::User()->id)->get();

        foreach ($loggedInUser as $logged){

        }

        $nominee_info = Nominee::with('position','level')
            ->where('index_number',$logged->name)->get();



        if($logged->done == 1){
            return view('nominee_info')
                ->with('nominee_info',$nominee_info)
                ->with('loggedInUser',$loggedInUser);
        }else{
            $levels = Level::all();
            $positions = Position::all();
            return view('home')
                ->with('loggedInUser',$loggedInUser)
                ->with('levels',$levels)
                ->with('positions',$positions);
        }

    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

       // return $request;
        $this->Validate($request, [
            'image_file'=>'image|mimes:jpeg,png,jpg|max:7048',

        ]);
        $nominee = new Nominee();
        $nominee->voting_id=Auth::User()->voting_id;
        $nominee->first_name=$request->input('first_name');
        $nominee->last_name=$request->input('last_name');
        $nominee->other_name=$request->input('other_name');
        $nominee->date_of_birth=$request->input('dateOfBirth');
        $nominee->home_town=$request->input('home_town');
        $nominee->region=$request->input('region');
        $nominee->home_address=$request->input('home_address');
        $nominee->telephone=$request->input('telephone');
        $nominee->email=$request->input('email');
        $nominee->level_id=$request->input('levels');
        $nominee->department_id =Auth::User()->department_id;
        $nominee->index_number=Auth::User()->name;
        $nominee->cgpa=$request->input('cgpa');
        $nominee->position_id=substr($request->input('position'),0,strpos($request->input('position'),' '));
        $nominee->position_number = substr($request->input('position'),strpos($request->input('position'),' '));
        $nominee->position_held=$request->input('previous_position');
        $image = $request->file('image_file');

        if ($image != ''){
            $image_name = Auth::User()->name.".".$image->getClientOriginalExtension();

            $path = public_path('img/nominee_img/' . $image_name);


            Image::make($image->getRealPath())->resize(200, 200)->save($path);
            //$image->move(public_path("img/nominee_img"),$image_name);

            $nominee->image=$image_name;
            $nominee->added_by=Auth::user()->name;

            $checkNominee = Nominee::all()
                ->where('index_number',Auth::user()->name)
                ->count();
            if ($checkNominee>0){
                return redirect('/home')
                    ->with('error','Nominee  already exist');
            }else{
                if ($nominee->save()){
                    $nominee_token = NomineeToken::find(Auth::User()->id);
                    $nominee_token->done = 1;
                    $nominee_token->save();

                    $lastInsertedId = $nominee->id;
                    $nominee_info = Nominee::with('position','level')
                        ->where('id',$lastInsertedId)->get();

                    $loggedInUser  = NomineeToken::with('department','voting')
                        ->where('id',Auth::User()->id)->get();


                    return view('show')
                        ->with('nominee_info',$nominee_info)
                        ->with('loggedInUser',$loggedInUser);
                }
            }
        }else{
            return redirect('/home')
                ->with('error','Select a Profile Photo');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nominee_info = Nominee::with('position','level')
            ->where('id',$id)->get();

        $loggedInUser  = NomineeToken::with('department','voting')
            ->where('id',Auth::User()->id)->get();

        return view('show')
            ->with('nominee_info',$nominee_info)
            ->with('loggedInUser',$loggedInUser);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


    }

    public function getImages($id){

        return 'me';
    }
}
