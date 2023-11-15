<?php

namespace App\Http\Controllers;

use App\Http\Requests\Figure\AddFigureRequest;
use App\Models\Figure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FigureController extends Controller
{
    //
    public function index()
    {
        //30 hàng mới nhất
        $figure36row = Figure::limit(30)->orderBy("created_at","desc")->get();
        return view("Figure.get_list",["figures"=>$figure36row]);
    }

    public function showDetail(Figure $figureID)
    {
        //model binding
        return view('Figure.get_detail_figure',['figure'=> $figureID]);
    }
    public function getFormAddFigure(Request $request)
    {
        return view('Figure.add_figure');
    }

    public function addFigure(AddFigureRequest $request)
    {
        $figure = $request->validated();
        if ($request->hasFile('hinh_anh')) {
            $path = Storage::disk('public')->put("images", $request->file('hinh_anh'));
            $figure['hinh_anh']='storage/'.$path;
        } else {
            $figure['hinh_anh']='images/emptyFigure.webp';
        }
        $status = Figure::create($figure);
        if ($status) {
            return redirect()->back()->with([
                'status' => 'Đã thêm mô hình thành công'
            ]);
        }

        return redirect()->back()->with([
            'status' => 'Thêm thất bại'
        ]);
    }
}
