<?php

namespace roombooker\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use roombooker\Building;
use roombooker\Room;
use roombooker\BookingDraft;

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
        $draft->booker_id = $request->user()->id;
        return response()->json($draft, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
