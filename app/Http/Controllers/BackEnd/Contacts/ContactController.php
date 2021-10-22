<?php

namespace App\Http\Controllers\Backend\Contacts;
use App\Models\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
class ContactController extends Controller
{
    protected $contacts;

    public function __construct(Contact $contacts)
    {
        $this->contacts = $contacts;
    }

    public function index()
    {
        $contacts = $this->contacts->paginate(3);
        return view('backend.admin.contacts.index', compact('contacts'));
    }

  

 
    public function view(Request $request)
    {
        $contacts = $this->contacts->find($request->id);
        return view('backend/admin/contacts/view', compact('contacts'));
    }

    public function delete(Request $request)
    {
        $contacts = $this->contacts->find($request->id);
        $contacts->delete();
        return redirect()->route('backend.admin.contacts.show')->with('success', Lang::get('message.delete', ['model' => 'Danh mục']));
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
                ->orderBy('id', 'asc')
                ->paginate(6);
        } else {
            $contacts = $this->contacts->paginate(3);
        }
        if ($request->ajax()) {
            $view = view('backend.admin.contacts.search', compact('contacts'))->render();
            return response()->json(['html' => $view]);
        }
    }
}
