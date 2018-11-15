<?php

namespace roombooker\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Front page
     *
     * @return View
     */
    public function index() {
        return view('front.index', ['title' => 'Room Booking, Simpler']);
    }

    /**
     * Room overview
     *
     * @return View
     */
    public function about() {
        return view('front.about', ['title' => 'About Us']);
    }

    /**
     * FAQ
     *
     * @return View
     */
    public function faq() {
        return view('front.faq', ['title' => 'FAQ']);
    }

    /**
     * View contact form
     *
     * @return View
     */
    public function getContact() {
        return view('front.contact', ['title' => 'Contact Us']);
    }

    /**
     * Handle post contact form
     *
     * @return View
     */
    public function postContact() {

    }
}
