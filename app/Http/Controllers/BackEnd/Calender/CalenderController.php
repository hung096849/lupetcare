<?php

namespace App\Http\Controllers\Backend\Calender;

use App\Http\Controllers\Controller;
use App\Models\Scheduled;
use Illuminate\Http\Request;

class CalenderController extends Controller
{
    protected $scheduled;

    public function __construct(Scheduled $scheduled)
    {
        $this->scheduled = $scheduled;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->scheduled->whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title', 'start', 'end']);

            return response()->json($data);
        }

        return view('backend/admin/calender/index');
    }

    public function ajax(Request $request)
    {

        switch ($request->type) {
            case 'add':
                $event = $this->scheduled->create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'update':
                $event = $this->scheduled->find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);

                return response()->json($event);
                break;

            case 'delete':
                $event = $this->scheduled->find($request->id)->delete();
                return response()->json($event);
                break;

            default:
                # code...
                break;
        }
    }
}
