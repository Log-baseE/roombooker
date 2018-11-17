<?php

namespace roombooker\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
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
        $user = Auth::user();
        $context_data = self::getContextData('Dashboard', 'dashboard', []);
        return view('dashboard.index', $context_data);
    }

    /**
     * Get context data of request
     *
     * @param string $title
     * @param string $active_tab
     * @param array $payload
     * @return array
     */
    private static function getContextData($title, $active_tab, $payload)
    {
        return [
            'title' => $title,
            'active' => $active_tab,
            'payload' => $payload
        ];
    }
}
