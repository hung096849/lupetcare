<?php

namespace App\Http\Controllers\Backend\Slides;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\Slide;
use function App\Helpers\uploadFile;
class SildeController extends Controller
{
    //
    protected $slides;
    public function __construct(Slide $slides)
    {
        $this->slides = $slides;
        
    }
    public function index()
    {
        $slides = $this->slides->paginate(3);
        return view('backend.admin.slides.index', compact('slides'));
    }
    public function slidesDelete(Request $request)
    {
        $this->customers->whereIn('id', explode(",", $request->ids))->delete();
        return response()->json(['success' => "Xóa danh sách slide thành công"]);
    }
    public function delete(Request $request)
    {
        $slides = $this->slides->find($request->id);
        $slides->delete();
        return redirect()->route('backend.admin.slides.show')->with('success', Lang::get('message.delete', ['model' => 'slide']));
    }
    public function create()
    {

        return view('backend/admin/slides/create');
    }

    public function store(Request $request)
    {
        $this->slides->create([
      
            'image' => uploadFile($request->image, 'Service_image')
        ]);
        return redirect()->route('backend.admin.slides.show')->with('success', Lang::get('message.create', ['model' => 'slides']));
    }

    public function edit(Request $request)
    {
        $categories = $this->categories->all();
        $slides = $this->slides->find($request->id);
        return view('backend/admin/slides/edit', compact('slides'));
    }

    public function update(Request $request)
    {

        $slides = $this->slides->where('id', $request->id)->first();
        if($request->image == ""){
            $image = $slides->image;
        }else{
            $image = uploadFile($request->image, 'Service_image');
        }
        $slides->update([
            'image' =>  $image,
        ]);
        return redirect()->route('backend.admin.slides.show')->with('success', Lang::get('message.create', ['model' => 'slides']));
    }

}
