<?php

namespace roombooker\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use roombooker\Building;
use roombooker\Room;
use roombooker\Booking;
use roombooker\BookingDraft;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
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
        $context = [];
        if(Auth::user()->is_admin) {
            $context = [
                'queue' => Booking::where('status', Booking::ACKNOWLEDGED_STATUS)->orderBy('updated_at', 'asc')->get(),
                'history' => Booking::where('status', '<>', Booking::INCOMPLETE_STATUS)->orderBy('updated_at', 'dsc')->take(100)->get(),
            ];
        } else {
            $context = [
                'drafts' => BookingDraft::where('booker_id', Auth::user()->id)->where('committed', false)->get(),
                'incompletes' => Booking::whereHas('details', function($query) {
                    $query->where('booker_id', Auth::user()->id);
                })->where('status', Booking::INCOMPLETE_STATUS)->get(),
                'completes' => Booking::whereHas('details', function($query) {
                    $query->where('booker_id', Auth::user()->id);
                })->where('status', '<>', Booking::INCOMPLETE_STATUS)->get(),
            ];
        }
        return view('dashboard.booking.index', self::getContextData($context));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $booking = null;
        if(Auth::user()->is_admin)
            $booking = Booking::findOrFail('B-'.$id);
        else
            $booking = Booking::whereHas('details', function($query) {
                $query->where('booker_id', Auth::user()->id);
            })->findOrFail('B-'.$id);
        $context = [
            'title' => 'Booking '.$booking->id,
            'booking' => $booking,
        ];
        return view('dashboard.booking.show', self::getContextData($context));
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
        if( isset($payload) ) {
            foreach ($payload as $key => $value) {
                $context[$key] = $value;
            }
        }
        return $context;
    }
}
