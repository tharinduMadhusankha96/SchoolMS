<?php

namespace App\Http\Controllers;

use App\Society;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SocietyController extends Controller
{

    public function index()
    {
        $societies = Society::all();

        return view('society.index')->with('societies' , $societies );
    }

    public function create()
    {
       return view('society.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(),[

            'title' => 'required',
            'teacherInCharge' => 'required',
            'description' => 'required',
            'mission' => 'required',
            'venue' => 'required',
            'from' => 'required',
            'to' => 'required',
            'meetingsOn' => 'required',
            'president' => 'required',
            'secretary' => 'required',
            'treasurer' => 'required',
            'image' => 'required',

        ]);

        if($request->has('venue'))
        {
            $location = request('venue');
            $tod = request('to');
            $fromd =request('from');

            //There is an society within the timeslot that is provided
            $societyCheck1 = Society::where('location',$location)
                ->where('from','>=', $fromd)
                ->where('to','<=',$tod)
                ->first();

            //The society created is within the timeslot of an societys that has been created previously
            $societyCheck2 = Society::where('location',$location)
                ->Where('from','<=',$fromd )
                ->Where('to','>=',$tod )
                ->first();

            //To check whether the From Date Value is entered within a timeslot of an society
            $societyCheck3 = Society::where('location',$location)
                ->where('from','<=',$fromd)
                ->where('to', '>=' , $fromd)
                ->first();

            //To check whether the to Value is entered within a timeslot of an society
            $societyCheck4 = Society::where('location',$location)
                ->where('from','<=',$tod)
                ->where('to', '>=' , $tod)
                ->first();

            if($societyCheck1 || $societyCheck2 || $societyCheck3 || $societyCheck4)
            {
            }

            if($societyCheck1)
            {
                return redirect()->back()->with('error' ,"{$societyCheck1->location}&nbsp ".' is reserved FROM '."&nbsp{$societyCheck1->from}&nbsp". ' TO &nbsp'. "{$societyCheck1->to}". ' ');

            }elseif($societyCheck2){
                return redirect()->back()->with('error' , "{$societyCheck2->location} &nbsp".'is reserved FROM '."&nbsp{$societyCheck2->from}&nbsp". ' TO &nbsp'. "{$societyCheck2->to}". ' ');
            }
            elseif ($societyCheck3){
                return redirect()->back()->with('error' , "{$societyCheck3->location}&nbsp ".'is reserved FROM '."&nbsp{$societyCheck3->from}&nbsp". ' TO &nbsp'. "{$societyCheck3->to}". ' ');
            }
            elseif($societyCheck4){
                return redirect()->back()->with('error' , "{$societyCheck4->location} &nbsp".'is reserved FROM '."&nbsp{$societyCheck4->from}&nbsp". ' TO &nbsp'. "{$societyCheck4->to}". ' ');
            }
        }

        $weekdays = $request->meetingsOn;
        $newVal = implode( ',' , $weekdays);


        if ($request->hasFile('image')) {

            $imageName = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($imageName, PATHINFO_FILENAME);
            $imageExt = $request->file('image')->getClientOriginalExtension();

            $filenameToStore = $filename . '_' . time() . '.' . $imageExt;

            $path = $request->file('image')->storeAs('public/img', $filenameToStore);


        } else {
            $filenameToStore = 'society_default.jpg';
        }

        $society = new Society;

        $society->title = request('title');
        $society->description = request('description');
        $society->from = request('from');
        $society->to = request('to');
        $society->image = $filenameToStore;
        $society->user_id = request('teacherInCharge');
        $society->mission = request('mission');
        $society->president = request('president');
        $society->secretary = request('secretary');
        $society->treasurer = request('treasurer');
        $society->location = request('venue');
        $society->meetingsOn = $newVal;


        $society->save();

        return redirect('/Society')->with('success', "New society '" . "{$society->title}" . "' has been created ");

    }


    public function show($id)
    {
        $society = Society::find($id);

        return view('society.show')->with('society', $society);
    }


    public function edit($id)
    {
        $sp = Society::find($id);

        $result = $sp->meetingsOn;
        $checkbox = explode(",", $result);

        if($sp){
            return view('Society.edit')->with('society' , $sp)->with('checkbox' , $checkbox);
        }else{
            return back()->with('error','Could not find the society');
        }
    }


    public function update(Request $request, $id)
    {
        dd($request);

        $this->validate(request(), [
            'title' => 'required',
            'description' => 'required',
            'mission' => 'required',
            'venue ' => 'required',
            'from' => 'required',
            'meetingsOn' => 'required',
            'to' => 'required',
            'president' => 'required',
            'secretary' => 'required',
            'treasurer' => 'required',
            'image' => 'required',
            'user_id' => 'required'
        ]);

        if($request->has('venue'))
        {
            $location = request('venue');
            $tod = request('to');
            $fromd =request('from');

            //There is an society within the timeslot that is provided
            $societyCheck1 = Society::where('location',$location)
                ->where('from','>=', $fromd)
                ->where('to','<=',$tod)
                ->first();

            //The society created is within the timeslot of an societys that has been created previously
            $societyCheck2 = Society::where('location',$location)
                ->Where('from','<=',$fromd )
                ->Where('to','>=',$tod )
                ->first();

            //To check whether the From Date Value is entered within a timeslot of an society
            $societyCheck3 = Society::where('location',$location)
                ->where('from','<=',$fromd)
                ->where('to', '>=' , $fromd)
                ->first();

            //To check whether the to Value is entered within a timeslot of an society
            $societyCheck4 = Society::where('location',$location)
                ->where('from','<=',$tod)
                ->where('to', '>=' , $tod)
                ->first();
//
//            if($societyCheck1 || $societyCheck2 || $societyCheck3 || $societyCheck4)
//            {
//
//            }

            if($societyCheck1)
            {
                return redirect()->back()->with('error' ,"{$societyCheck1->location}&nbsp ".' is reserved FROM '."&nbsp{$societyCheck1->from}&nbsp". ' TO &nbsp'. "{$societyCheck1->to}". ' ');

            }elseif($societyCheck2){
                return redirect()->back()->with('error' , "{$societyCheck2->location} &nbsp".'is reserved FROM '."&nbsp{$societyCheck2->from}&nbsp". ' TO &nbsp'. "{$societyCheck2->to}". ' ');
            }
            elseif ($societyCheck3){
                return redirect()->back()->with('error' , "{$societyCheck3->location}&nbsp ".'is reserved FROM '."&nbsp{$societyCheck3->from}&nbsp". ' TO &nbsp'. "{$societyCheck3->to}". ' ');
            }
            elseif($societyCheck4){
                return redirect()->back()->with('error' , "{$societyCheck4->location} &nbsp".'is reserved FROM '."&nbsp{$societyCheck4->from}&nbsp". ' TO &nbsp'. "{$societyCheck4->to}". ' ');
            }
        }

        $weekdays = $request->meetingsOn;
        $newVal = implode( ',' , $weekdays);


        if ($request->hasFile('image')) {

            $imageName = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($imageName, PATHINFO_FILENAME);
            $imageExt = $request->file('image')->getClientOriginalExtension();

            $filenameToStore = $filename . '_' . time() . '.' . $imageExt;

            $path = $request->file('image')->storeAs('public/img', $filenameToStore);


        } else {
            $filenameToStore = 'societys_default.jpg';
        }

        $society = Society::find($id);

        $society->title = request('title');
        $society->description = request('description');
        $society->mission = request('mission');
        $society->from = request('from');
        $society->to = request('to');
        $society->user_id = request('teacherInCharge');
        $society->image = $filenameToStore;
        $society->location = request('venue');
        $society->president = request('president');
        $society->secretary = request('secretary');
        $society->treasurer = request('treasurer');
        $society->meetingsOn = $newVal;


        $society->save();

        $societies = Society::all();

        return view('society.index')->with('society',$society)->with('societies' , $societies)->with('success', "society '" . "{$society->title}" . "' has been updated ");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Society  $society
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $society = Society::find($id);

        if ($society) {
            $society->delete();
            return redirect('society.index')->with('success', "society '" . "{$society->title}" . "' has been deleted ");
        }

        return redirect('society')->with('error', "society was not deleted ");
    }

    public function addStudent(request $request)
    {

        $society = Society::find($request->input('society_id'));

        $user = User::where('id', $request->input('user_id'))->first();

        $societyUser = DB::table('society_user')
            ->where('user_id', $user->id)
            ->where('society_id', $society->id)
            ->first();

        if ($societyUser) {

            return view('society.show')->with('society', $society)->with('error', "User already enrolled");

        }else{
            if ($user && $society) {
                $society->users()->attach($user->id);

                return view('society.show')->with('society', $society)->with('success', "User has been added");
            }else{
                return view('society.show')->with('error', "User has not been added");
            }

        }

    }

    public function removeStudent(request $request)
    {

        $society = Society::find($request->input('society_id'));

        $user = User::where('id', $request->input('user_id'))->first();

        $societyUser = DB::table('society_user')
            ->where('user_id', $user->id)
            ->where('society_id', $society->id)
            ->first();




        if ($societyUser)
        {

            DB::table('society_user')->where('user_id', $user->id )
                ->where('society_id',$society->id )
                ->delete();

            return view('society.show')->with('society' , $society)->with('success', "User Un-Enrolled");

        }else{

            return view('society.show')->with('society', $society)->with('error', "User was not Un-Enrolled");

        }

    }

    public function enrolledStudents(request $request)
    {
        $students = DB::table('society_user')
            ->where('society_id',$request->input('society_id'))->get();

        $user=null;

        if($students){

            foreach ($students as $student) {

                $user[] = User::find($student->user_id);
            }

            if($user)
            {
                return view('society.enrolledStudents')->with('students', $students)->with('user' , $user);
            }else{
                return redirect()->back()->with('error' , "There are no students that has enrolled under this society");
            }

        }else{
            return redirect()->back()->with('error' , "There are no students that has enrolled under this society");

        }

    }

    public function mysocieties()
    {
        if (Auth()->user())
        {
            $user = Auth()->user();
            $name = $user->name;

            $id = $user->id;

            $societies = Society::orderBy('created_at', 'desc')->where('user_id', $id)->paginate(3);

            return view('society/mysocieties')->with('societies', $societies)->with('success', "Showing societies of '" . "{$name}" . "' .");
        }

    }
}
