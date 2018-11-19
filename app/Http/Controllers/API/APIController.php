<?php

namespace roombooker\Http\Controllers\API;

use Illuminate\Http\Request;
use roombooker\Http\Controllers\Controller;
use roombooker\Room;

class APIController extends Controller
{
    /**
     * Return rooms in building as json
     *
     * @param Request $request
     * @return string
     */
    public function roomsInBuilding(Request $request)
    {
        $b_id = $request->input('b_id');
        return response()->json(Room::where('building_id', $b_id)->orderBy('name', 'asc')->get(), 200);
    }

    public function roomDetail(Request $request)
    {
        $r_id = $request->input('r_id');
        $room = Room::findOrFail($r_id);
        $room['facilities'] = $room->facilities;
        return response()->json($room, 200);
    }
}
