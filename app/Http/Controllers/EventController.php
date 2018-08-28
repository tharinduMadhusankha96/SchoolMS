<?php

namespace App\Http\Controllers;

use App\Event;
use Faker\Provider\DateTime;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use Image;
Use MaddHatter\LaravelFullcalendar\Facades\Calendar;
Use MaddHatter\LaravelFullcalendar;
Use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('created_at', 'asc')->paginate(3);


        if($month = request('month'))
        {
            $events->whereMonth('from_date' , Carbon::parse($month)->month);
        }

        if($year = request('year'))
        {
            $events->whereYear('from_date' , $year);
        }



//        $events = $events->get();

        $archs = Event::selectRaw(' year(from_date) year , monthname(from_date) month, count(*)')
            ->groupBy('year','month')
            ->orderByRaw('min(from_date)')
            ->get()
            ->toArray();

        return view('event.index',compact('events' , 'archs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image'))
        {

            $imageName = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($imageName , PATHINFO_FILENAME);
            $imageExt = $request->file('image')->getClientOriginalExtension();

            $filenameToStore = $filename.'_'.time() . '.' . $imageExt;

            $path = $request->file('image')->storeAs('public/img', $filenameToStore);


        }
        else{
            $filenameToStore = 'default.png';
        }

        $event = new Event;

        $event->title = request('title');
        $event->description = request('description');
        $event->detailed_Description = request('detailed_Description');
        $event->venue = request('venue');
//        $event->on = "2011-09-16";
        $event->from_date = request('from_date');
        $event->to_date = request('to_date');
        $event->from_grade = request('from_grade');
        $event->to_grade = request('to_grade');
        $event->society_id = 1;
        $event->image =$filenameToStore;
        $event->user_id = auth()->user()->id;
        $event->act_income = request('act_income');
        $event->act_expense = request('act_expense');

        $id = $event->id;




        $event->save();

        return redirect('/Event/myevents');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);


        if ($id) {
            return view('event.show')->with('event', $event);
        } else {
            return "No events";
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $event = Event::find($id);

        return view('event.edit')->with('event',$event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('image'))
        {

            $imageName = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($imageName , PATHINFO_FILENAME);
            $imageExt = $request->file('image')->getClientOriginalExtension();

            $filenameToStore = $filename.'_'.time() . '.' . $imageExt;

            $path = $request->file('image')->storeAs('public/img', $filenameToStore);


        }
        else{
            $filenameToStore = 'default.png';
        }

        $event = Event::find($id);

        $event->title = request('title');
        $event->description = request('description');
        $event->detailed_Description = request('detailed_Description');
        $event->venue = request('venue');
        $event->from_date = request('from_date');
        $event->to_date = request('to_date');
        $event->from_grade = request('from_grade');
        $event->to_grade = request('to_grade');
        $event->image =$filenameToStore;
        $event->act_income = request('act_income');
        $event->act_expense = request('act_expense');

        $event->save();

        return redirect('/Event');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);

        if($event)
        {
            $event->delete();
            return redirect('Event/myevents');
        }

        return redirect('Event/myevents');
    }

//    public function nir()
//    {
//        return view('Event.staff');
//    }

    public function search()
    {
        $search = request('search');
        $events = Event::search($search)->paginate(3);

        return view('event.index')->with('events', $events);
    }

    public function myevents()
    {
        if(auth()->user())
        {
            $user = Auth::user();

            $id = $user->id;

            $events = Event::orderBy('created_at', 'desc')->where('user_id', $id)->paginate(3);

            return view('event.myevents')->with('events', $events);
        }

        return redirect('/Event');

    }

    public function showEvent($id)
    {
        $event = Event::find($id);


        if ($id) {
            return view('event.show')->with('event', $event);
        } else {
            return "No events";
        }

    }

    public function updateImage(Request $request, $id)
    {
        if ($request->hasFile('image'));
        {

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->storeAs('public/img', $filename);

//        $image = $request->file('image');
//        $filename = time(). '.' . $image->getClientOriginalExtension();
//        Image::make($image)->resize(200 , 250 )->store(public_path('/event_images','$filename'));

//        $user = Auth::user();
//        $user->image = $filename;
//        $user->save();

            $event = Event::find($id);
            $event->image = $filename;
            $event->save();
        }


        return view('event.show')->with('event', $event);
    }

    public function calendar()
    {
        $events = Event::all();

        $e_list = [];

        foreach ($events as $key=>$event) {


            $e_list[] = Calendar::event(
                $event->title,
                true,
                new \DateTime($event->from_date),
                new \DateTime($event->to_date)

            );

            $cal_events = Calendar::addEvents($e_list);

            return view('event.calendar')->with('cal_events', $cal_events);

        }
    }


}
