<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\Menu as Resource;
use App\Mail\NewsLetter as MailNewsLetter;
use App\Newsletter;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::all();
        return Resource::collection($newsletters);
    }

    public function destroy($id)
    {
        $newsletter = Newsletter::findOrFail($id);
        if($newsletter){
            $newsletter->delete();
        }
        $newsletters  = Newsletter::all();
        return Resource::collection($newsletters);
    }

    public function sendEmailToSubscribers(Request $request)
    {
        $emails = Newsletter::pluck('email');
        $message = $request->all();
        foreach ($emails as $email) {
            Mail::to($email)->send(new MailNewsLetter($message));
        }
    }
}
