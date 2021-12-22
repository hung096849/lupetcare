<?php

namespace App\Http\Controllers\Backend\Event;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\RecurringEvent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class RecurringEventController extends Controller
{
    protected $order;
    protected $users;
    public function __construct(Order $order, User $users)
    {
        $this->order = $order;
        $this->users = $users;
    }

    public function index(Request $request){
        $events = new RecurringEvent();

        $from = $request->from;
        $to = $request->to;

        return response()->json([
            "data" => $events->
                where("start_date", "<", $to)->
                where("end_date", ">=", $from)->get()
        ]);
    }

    public function store(Request $request){
        $event = new RecurringEvent();

        $event->text = strip_tags($request->text);
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->rec_type = $request->rec_type;
        $event->event_length = NULL;
        $event->event_pid = $request->event_pid;
        $event->save();

        $status = "inserted";
        if($event->rec_type == "none"){
            $status = "deleted";
        }

        return response()->json([
            "action"=> $status,
            "tid" => $event->id
        ]);
    }

    public function update($id, Request $request){
        $event = RecurringEvent::find($id);

        $event->text = strip_tags($request->text);
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->rec_type = NULL;
        $event->event_length = NULL;
        $event->event_pid = NULL;
        $event->save();
        $this->deleteRelated($event);
        return response()->json([
            "action"=> "updated"
        ]);
    }

    private function deleteRelated($event){
        if($event->event_pid && $event->event_pid !== "none"){
            RecurringEvent::where("event_pid", $event->id)->delete();
        }
    }

    public function destroy($id){
        $event = RecurringEvent::find($id);

        // delete the modified instance of the recurring series
        if($event->event_pid){
            $event->rec_type = "none";
            $event->save();
        }else{
            // delete a regular instance
            $event->delete();
        }
        $this->deleteRelated($event);
        return response()->json([
            "action"=> "deleted"
        ]);
    }

    public function scheduled(Request $request){
        
        $user = $this->users->find($request->user_id);
        $user->update([
            'number_book' => $user->number_book + 1 
        ]);

        $order = $this->order->find($request->id);
        
        $order->update([
            'status' => Order::STATUS_PROCESS,
            'user_id' => $user->id
        ]);

        $event = new RecurringEvent();

        $event->text = strip_tags($request->text);
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->rec_type = $request->rec_type;
        $event->event_length = NULL;
        $event->event_pid = $request->event_pid;
        $event->save();
        
        $status = "inserted";
        if($event->rec_type == "none"){
            $status = "deleted";
        }

        return response()->json([
            'status' => 200,
            "action"=> $status,
            "tid" => $event->id
        ]);
    }
}
