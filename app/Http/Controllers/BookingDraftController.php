<?php

namespace roombooker\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use roombooker\Building;
use roombooker\Room;
use roombooker\BookingDraft;
use roombooker\Facility;

class BookingDraftController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $context = [
            'buildings' => Building::all(),
            'title' => 'Create new booking'
        ];
        $id = $request->input('r_id');
        if (isset($id)) {
            $current = Room::find($id);
            $context['current'] = $current;
        }
        return view('dashboard.draft.create', self::getContextData($context));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $draft = new BookingDraft;
        $draft->room_id = $request->input('room');
        $draft->purpose = $request->input('purpose');
        $draft->comments = $request->input('comment');
        $draft->start_datetime = date('Y-m-d h:m:s',strtotime($request->input('startDateTime')));
        $draft->end_datetime = date('Y-m-d h:m:s',strtotime($request->input('endDateTime')));
        $draft->committed = false;
        $draft->booker_id = $request->user()->id;
        $draft->save();
        $ids = array_keys($request->input('facility'));
        $facilities = Facility::find($ids);
        $draft->facilities()->attach($facilities, [
            'room_id' => $draft->room_id
        ]);
        return response()->json($draft, 200);
        // return redirect()->action('BookingDraftController@show', ['id' => preg_replace('/BD\-(.*)/','$1',$draft->id)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(BookingDraft::find('BD-'.$id),200);
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
        //
    }

    /**
     * Get context data of request
     *
     * @param array $payload
     * @return array
     */
    private static function getContextData($payload)
    {
        $context = [
            'title' => 'Bookings',
            'active' => 'bookings',
        ];
        if(isset($payload)) {
            foreach ($payload as $key => $value) {
                $context[$key] = $value;
            }
        }
        return $context;
    }
}
