<?php

namespace App\Http\Controllers\Backend\PetInfor;

use App\Http\Controllers\Controller;
use App\Models\PetInformartion;
use Illuminate\Http\Request;

class PetInforController extends Controller
{
    protected $petInfomation;

    public function __construct(PetInformartion $petInfomation)
    {
        $this->petInfomation = $petInfomation;
    }

    public function index()
    {
        $petInfomations = $this->petInfomation->sortable()->paginate(3);
        return view('backend.admin.pet_infomation.index', compact('petInfomations'));
    }

    public function create()
    {
        return view('backend.admin.pet_infomation.create');
    }

    public function store(Request $request)
    {
        $this->petInfomation->create([
            'code' => 'LUPETCARE-' . $request->code,
            'name' => $request->name,
            'weight' => $request->weight,
            'gender' => $request->gender,
        ]);
        return redirect()->route('backend.admin.petinformation.show')->with('success', Lang::get('message.create', ['model' => 'Thú cưng']));
    }

    public function edit(Request $request)
    {
        $petinfomation = $this->petInfomation->find($request->id);
        return view('backend.admin.pet_infomation.edit', compact('petinfomation'));
    }

    public function update(Request $request)
    {
        $petInfo = $this->petInfomation->find($request->id);
        $petInfo->update([
            'name' => $request->name,
            'weight' => $request->weight,
            'gender' => $request->gender,
        ]);
        return redirect()->route('backend.admin.petinformation.show')->with('success', Lang::get('message.update', ['model' => 'Thú cưng']));
    }

    public function view(Request $request)
    {
        $petInfomation = $this->petInfomation->find($request->id);
        return view('backend.admin.pet_infomation.view', compact('petInfomation'));
    }

    public function delete(Request $request)
    {
        $petinfomation = $this->petInfomation->find($request->id);
        $petinfomation->delete();
        return redirect()->route('backend.admin.petinformation.show')->with('success', Lang::get('message.delete', ['model' => 'Thú cưng']));
    }

    public function petDelete(Request $request)
    {
        $this->petInfomation->whereIn('id', explode(",", $request->ids))->delete();
        return response()->json(['success' => "Xóa thú cưng thành công"]);
    }

    public function search(Request $request)
    {
        if ($request->search != "") {
            $petInfomations = $this->petInfomation
                ->where('name', 'like', '%' . $request->search . '%')
                ->orderBy('id', 'asc')
                ->paginate(6);
        } else {
            $petInfomations = $this->petInfomation->paginate(3);
        }
        if ($request->ajax()) {
            $view = view('backend.admin.pet_infomation.search', compact('petInfomations'))->render();
            return response()->json(['html' => $view]);
        }
    }
}
