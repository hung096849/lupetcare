<?php

namespace App\Http\Controllers\BackEnd\Sms;

use App\Constant\PermissionConstant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sms;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class SmsController extends Controller
{
    protected $sms;

    public function __construct(Sms $sms)
    {
        $this->sms = $sms;
    }

    public function index()
    {
        if(Auth::user()->can(PermissionConstant::SMS_PERMISSION_LIST)) {
        $sms = $this->sms->sortable()->paginate(10);
        return view('backend.admin.sms.index', compact('sms'));
    }
    }

    public function view(Request $request)
    {
        if(Auth::user()->can(PermissionConstant::SMS_PERMISSION_VIEW)) {
        $sms = $this->sms->find($request->id);
        return view('backend.admin.sms.view',compact('sms'));
        }
    }

    public function delete(Request $request)
    {
        if(Auth::user()->can(PermissionConstant::SMS_PERMISSION_DELETE)) {
        $sms = $this->sms->find($request->id);
        $sms->delete();
        return redirect()->route('backend.admin.sms.show')->with('success', Lang::get('message.delete', ['model' => 'Tin Nhắn']));
        }
    }

    public function smsDelete(Request $request)
    {
        if(Auth::user()->can(PermissionConstant::SMS_PERMISSION_DELETE)) {
        $this->sms->whereIn('id', explode(",", $request->ids))->delete();
        return response()->json(['success' => "Xóa thành công"]);
        }
    }

    public function search(Request $request)
    {
        if ($request->search != "") {
            $sms = $this->sms
                ->where('phone', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'asc')
                ->paginate(10);
        } else {
            $sms = $this->sms->sortable()->paginate(10);
        }
        if ($request->ajax()) {
            $view = view('backend.admin.sms.search', compact('sms'))->render();
            return response()->json(['html' => $view]);
        }
    }
}
