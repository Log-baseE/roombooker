<?php

namespace roombooker\Http\Controllers\API;

use Illuminate\Http\Request;
use roombooker\Http\Controllers\Controller;
use roombooker\Room;
use roombooker\Booking;
use Carbon\Carbon;

class APIController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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

    public function generateAccessCode(Request $request)
    {
        $user_id = $request->user()->id;
        $booking_id = $request->input('bid');
        $booking = Booking::whereHas('details', function($query) use($user_id) {
            $query->where('booker_id', $user_id);
        })->findOrFail($booking_id);
        $booking->access_code = self::rand_chars("ABCDEFGHJKLMNPQRSTUVWXY3456789", 6);
        $booking->code_expiry = Carbon::now()->addHour();
        $booking->save();
        return response()->json([
            'code' => $booking->access_code,
            'expiry' => $booking->code_expiry->timestamp,
        ], 200);
    }

    /**
     * Generate random string
     *
     * @param string $chars
     * @param int $length
     * @param boolean $unique
     * @return string
     */
    private static function rand_chars($chars, $length, $unique = FALSE) {
        if (!$unique)
            for ($s = '', $i = 0, $z = strlen($chars)-1; $i < $length; $x = random_int(0,$z), $s .= $chars{$x}, $i++);
        else
            for ($i = 0, $z = strlen($chars)-1, $s = $chars{random_int(0,$z)}, $i = 1; $i != $length; $x = random_int(0,$z), $s .= $chars{$x}, $s = ($s{$i} == $s{$i-1} ? substr($s,0,-1) : $s), $i=strlen($s));
        return $s;
    }
}
