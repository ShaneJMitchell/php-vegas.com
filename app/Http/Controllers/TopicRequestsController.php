<?php

namespace App\Http\Controllers;

use App\Request as TopicReq;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Mail\TopicRequested;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;

/**
 * Class TopicRequestsController
 *
 * @package App\Http\Controllers
 */
class TopicRequestsController extends Controller
{
    /**
     * Returns the view for the request form.
     *
     * @return View
     */
    public function index(): View
    {
        return view('requests');
    }

    /**
     * Sends an email and then redirects you to the thank you page.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function insert(Request $request): RedirectResponse
    {
        $topicReq = new TopicReq();

        $topicReq->first_name = $request->fname;
        $topicReq->last_name = $request->lname;
        $topicReq->email_address = $request->email;
        $topicReq->phone_number = $request->phone;
        $topicReq->topic_request = $request->topic_request;

        $topicReq->save();

        Mail::to(getenv('MAIL_TO'))->send(new TopicRequested($request));

        return redirect('/meetup-events/request-topic/thanks');
    }

    /**
     * Displays the thank you page for sending in a topic request.
     *
     * @return View
     */
    public function thanks(): View
    {
        return view('thanks', [
            'title'   => 'Thanks For Requesting A Topic',
            'content' => 'We look forward to seeing you at the meetup!'
        ]);
    }
}
