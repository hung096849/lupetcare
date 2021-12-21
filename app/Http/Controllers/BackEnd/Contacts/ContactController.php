<?php

namespace App\Http\Controllers\Backend\Contacts;
use App\Constant\PermissionConstant;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Auth;
class ContactController extends Controller
{
    protected $contacts;

    public function __construct(Contact $contacts)
    {
        $this->contacts = $contacts;
    }

    public function index()
    {
        if(Auth::user()->can(PermissionConstant::CONTATCS_PERMISSION_LIST)) {
        $contacts = $this->contacts->sortable()->paginate(3);
        return view('backend.admin.contacts.index', compact('contacts'));
        }
    }

  

 
    public function view(Request $request)
    {
        if(Auth::user()->can(PermissionConstant::CONTACTS_PERMISSION_VIEW)) {
        $contacts = $this->contacts->find($request->id);
        return view('backend/admin/contacts/view', compact('contacts'));
        }
    }

    public function delete(Request $request)
    {
        if(Auth::user()->can(PermissionConstant::CONTACTS_PERMISSION_DELETE)) {
        $contacts = $this->contacts->find($request->id);
        $contacts->delete();
        return redirect()->route('backend.admin.contacts.show')->with('success', Lang::get('message.delete', ['model' => 'Ý kiến khách hàng']));
        }
    }

    public function contactsDelete(Request $request)
    {
        $this->contacts->whereIn('id', explode(",", $request->ids))->delete();
        return response()->json(['success' => "Xóa thành công"]);
    }

    public function search(Request $request)
    {
        if ($request->search != "") {
            $contacts = $this->contacts
                ->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('phone','like','%'.$request->search.'%')
                ->orWhere('email','like','%'.$request->search.'%')
                ->orderBy('id', 'asc')
                ->paginate(6);
        }
      
         else {
            $contacts = $this->contacts->paginate(3);
        }
        if ($request->ajax()) {
            $view = view('backend.admin.contacts.search', compact('contacts'))->render();
            return response()->json(['html' => $view]);
        }
    }
}
