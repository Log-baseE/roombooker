<?php

namespace roombooker\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use roombooker\Building;
use roombooker\Room;

class RoomController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $b = Input::get('b');
        $chosen = Building::find($b);
        $rooms = Room::where('building_id', $b)->orderBy('name', 'asc')->get();
        $payload = [
            'buildings' => Building::all(),
            'chosen' => $chosen,
            'rooms' => $rooms,
        ];
        return view('dashboard.room.index', self::getContextData($payload));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::findOrFail($id);
        $payload = [
            'room' => $room,
        ];
        return view('dashboard.room.show', self::getContextData($payload));
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
     * Get context data of requests
     *
     * @param array $payload
     * @return array
     */
    private static function getContextData($payload)
    {
        $context = [
            'title' => 'Rooms',
            'active' => 'rooms',
        ];
        foreach ($payload as $key => $value) {
            $context[$key] = $value;
        }
        return $context;
    }
}
