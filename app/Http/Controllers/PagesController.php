<?php
namespace App\Http\Controllers;

class PagesController extends Controller {
    public function index() {
        #process variable data or params
        #talk to the model
        #receive from the model
        #compile or process data from model
        #pass that to correct view
        return view('pages.welcome');
    }

    public function about() {
        $first = 'Richard';
        $last = 'Duong';
        $fullname = $first . " " . $last;
        $email = 'r_duong89@yahoo.com';
        #return view('pages.about')->with("fullname", $fullname);
        $data = [];
        $data['email'] = $email;
        $data['fullname'] = $fullname;
        return view('pages.about')->withFullname($fullname)->withEmail($email);
    }

    public function contact() {
        return view('pages.contact');
    }

}