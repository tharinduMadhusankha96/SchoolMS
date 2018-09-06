<?php

namespace App\Http\Controllers;

use App\Sport;
use App\SportUser;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sports = Sport::all();

        return view('sports.index')->with('sports', $sports);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
//            'description' => 'required',
            'detailed_Description' => 'required',
            'venue' => 'required',
            'from_grade' => 'required|integer|min:0|max:13',
            'to_grade' => 'required|integer|min:0|max:13',
            'image' => 'required',
            'practicesOn' => 'required',
            'gender' => 'required'
        ]);

        $weekdays = $request->practicesOn;
        $newVal = implode( ',' , $weekdays);


        if ($request->hasFile('image')) {

            $imageName = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($imageName, PATHINFO_FILENAME);
            $imageExt = $request->file('image')->getClientOriginalExtension();

            $filenameToStore = $filename . '_' . time() . '.' . $imageExt;

            $path = $request->file('image')->storeAs('public/img', $filenameToStore);


        } else {
            $filenameToStore = 'sports_default.jpg';
        }

        $sport = new Sport;

        $sport->title = request('title');
        $sport->description = request('detailed_Description');
        $sport->from_grade = request('from_grade');
        $sport->to_grade = request('to_grade');
        $sport->image = $filenameToStore;
        $sport->user_id = request('teacherInCharge');
        $sport->gender = request('gender');
        $sport->practice_on = $newVal;


        $sport->save();

        return redirect('/Sport')->with('success', "New sport '" . "{$sport->title}" . "' has been created ");


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sport $sport
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sport = Sport::find($id);

        return view('sports.show')->with('sport', $sport);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sport $sport
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $sp = Sport::find($id);

        $result = $sp->practice_on;
//        $result = mysqli_fetch_assoc($result_set);
        $checkbox = explode(",", $result);

       if($sp){
           return view('sports.edit')->with('sport' , $sp)->with('checkbox' , $checkbox);
       }else{
           return back()->with('error','Could not find the Sport');
       }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Sport $sport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
//        dd($request);

        $this->validate(request(), [
            'title' => 'required',
//            'description' => 'required',
            'detailed_Description' => 'required',
            'venue' => 'required',
            'from_grade' => 'required|integer|min:0|max:13',
            'to_grade' => 'required|integer|min:0|max:13',
            'image' => 'required',
            'practicesOn' => 'required',
            'gender' => 'required'
        ]);

        $weekdays = $request->practicesOn;
        $newVal = implode( ',' , $weekdays);


        if ($request->hasFile('image')) {

            $imageName = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($imageName, PATHINFO_FILENAME);
            $imageExt = $request->file('image')->getClientOriginalExtension();

            $filenameToStore = $filename . '_' . time() . '.' . $imageExt;

            $path = $request->file('image')->storeAs('public/img', $filenameToStore);


        } else {
            $filenameToStore = 'sports_default.jpg';
        }

        $sport = Sport::find($id);

        $sport->title = request('title');
        $sport->description = request('detailed_Description');
        $sport->from_grade = request('from_grade');
        $sport->to_grade = request('to_grade');
        $sport->image = $filenameToStore;
        $sport->user_id = request('teacherInCharge');
        $sport->gender = request('gender');
        $sport->practice_on = $newVal;


        $sport->save();



        return view('sports.show')->with('sport',$sport)->with('success', "Sport '" . "{$sport->title}" . "' has been updated ");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sport $sport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sport = Sport::find($id);

        if ($sport) {
            $sport->delete();
            return redirect('Sport')->with('success', "Sport '" . "{$sport->title}" . "' has been deleted ");
        }

        return redirect('Sport')->with('error', "Sport '" . "{$sport->title}" . "' was not deleted ");

    }

    public function addStudent(request $request)
    {

        $sport = Sport::find($request->input('sport_id'));

        $user = User::where('id', $request->input('user_id'))->first();

        $sportUser = DB::table('sport_user')
            ->where('user_id', $user->id)
            ->where('sport_id', $sport->id)
            ->first();

        if ($sportUser) {

            return view('sports.show')->with('sport', $sport)->with('success', "User already enrolled");

        }else{
            if ($user && $sport) {
                $sport->users()->attach($user->id);

                return view('sports.show')->with('sport', $sport)->with('success', "User has been added");
            }else{
                return view('sports.show')->with('error', "User has not been added");
            }

        }

    }

    public function enrolledStudents(request $request)
    {
        $students = DB::table('sport_user')
            ->where('sport_id',$request->input('sport_id'))->get();

//        $students = SportUser::where('sport_id' , $request->input('sport_id'));

        foreach ($students as $student) {

            $user[] = User::find($student->user_id);

        }

        return view('sports.enrolledStudents')->with('students', $students)->with('user' , $user);
    }

    public function mysports()
    {
        if (Auth()->user())
        {
            $user = Auth()->user();

            $id = $user->id;

            $sports = Sport::orderBy('created_at', 'desc')->where('user_id', $id)->paginate(3);

            return view('sports/mysports')->with('sports', $sports)->with('success', "Showing sports of '" . "{{Auth()->user()->name();}}" . "' .");
        }

    }
}
