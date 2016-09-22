<?php
namespace App\Http\Controllers;
use App\User;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\StreamedResponse;
class MessagesController extends Controller
{
    /**
     * Show all of the message threads to the user.
     *
     * @return mixed
     */
    public function index()
    {
        $currentUserId = Auth::user()->id;
        // All threads, ignore deleted/archived participants
        $threads = Thread::getAllLatest()->get();
        // All threads that user is participating in
        // $threads = Thread::forUser($currentUserId)->latest('updated_at')->get();
        // All threads that user is participating in, with new messages
        // $threads = Thread::forUserWithNewMessages($currentUserId)->latest('updated_at')->get();
        return view('messenger.index', compact('threads', 'currentUserId'));
    }
    /**
     * Shows a message thread.
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect('messages');
        }
        // show current user in list if not a current participant
        // $users = User::whereNotIn('id', $thread->participantsUserIds())->get();
        // don't show the current user in list
        $userId = Auth::user()->id;
        $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();
        $thread->markAsRead($userId);
        return view('messenger.show', compact('thread', 'users'));
    }

    /**
     * @param $id
     * @return StreamedResponse
     */
    public function real($id)
    {
        $response = new StreamedResponse();
        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('Cach-Control', 'no-cache');
        $response->setCallback(function(){
            $start = time();

            $start = time();
            $id1 = (isset($_SERVER['HTTP_LAST_EVENT_ID'])) ? $_SERVER['HTTP_LAST_EVENT_ID'] + 1 : 1;

            while(true)
            {
                if ((time() - $start) > 10) {
                    break;
                }

                echo "id: this".$id1."\n";
                echo "retry: 1000\n";
                echo "data: ID ¹".$id1."\n\n";

                ob_flush();
                flush();

                $id1 += 1;
                sleep(1);
            }

        });

        return $response;
    }
    /**
     *



    $last_messages = '';
    // $user = Auth::user()->id;
    if(isset($_SERVER['HTTP_LAST_EVENT_ID'])){
    $last_messages = $_SERVER['HTTP_LAST_EVENT_ID'];
    } else {
    $last_messages = '1';
    }
    $start_time = time();
    do{
    //$message = message::where('thread_id',$last_messages)->first();
    //echo 'id'.$message->id.PHP_EOL;
    //echo 'id'.$message->id.PHP_EOL;
    //echo 'data'.$message->body.PHP_EOL;
    echo 'data: '.$last_messages . "\n\n";
    echo "retry: 10000\n";
    ob_flush();
    flush();
    if((time()-$start_time)>2){
    die();
    }
    sleep(3);
    }while(true) ;
     * Creates a new message thread.
     *
     * @return mixed
     */
    public function create()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        return view('messenger.create', compact('users'));
    }
    /**
     * Stores a new message thread.
     *
     * @return mixed
     */
    public function store()
    {
        $input = Input::all();
        $thread = Thread::create(
            [
                'subject' => $input['subject'],
            ]
        );
        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'body'      => $input['message'],
            ]
        );
        // Sender
        Participant::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
                'last_read' => new Carbon,
            ]
        );
        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipant($input['recipients']);
        }
        return redirect('messages');
    }
    /**
     * Adds a new message to a current thread.
     *
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect('messages');
        }
        $thread->activateAllParticipants();
        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::id(),
                'body'      => Input::get('message'),
            ]
        );
        // Add replier as a participant
        $participant = Participant::firstOrCreate(
            [
                'thread_id' => $thread->id,
                'user_id'   => Auth::user()->id,
            ]
        );
        $participant->last_read = new Carbon;
        $participant->save();
        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipant(Input::get('recipients'));
        }
        return redirect('messages/' . $id);
    }
}