<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller {
    public function index() 
    {
        #process variable data or params
        #talk to the model
        #receive from the model
        #compile or process data from model
        #pass that to correct view
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.welcome')->with('posts', $posts);
    }

    public function about() 
    {
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

    public function contact() 
    {
        return view('pages.contact');
    }

    public function postContact(Request $request)
    {
        request()->validate([
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10'
        ]);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('r_duong89@yahoo.com');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your Email was Sent!');
        return view('pages.contact');
    }

}