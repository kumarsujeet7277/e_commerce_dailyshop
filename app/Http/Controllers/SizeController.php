<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Size::all();
        return view('admin.size',$result);
    }

    public function manage_size(Request $request, $id='')
    {
        if($id > 0)
        {
            $arr = Size::where(['id'=>$id])->get();    

            $result['size'] = $arr['0']->size;
            $status['status'] = $arr['0']->status;
            $result['id'] = $arr['0']->id;
        }
        else
        {
            $result['size'] = '';
            $resulr['status'] = '';
            $result['id'] = 1;
        }
        return view('admin.manage_size', $result);
    }   

    public function manage_size_process(Request $request)
    {
            $request->validate([
                'size' => 'required|unique:sizes,size,'.$request->post('id'),
            ]);
    
            if($request->post('id') > 0)
            {
                $model = Size::find($request->post('id'));
                $msg = 'Size Updated Successfully.';
            }
            else
            {
                $model = new Size();
                $msg = 'Size Created successfully.';
            }
            $model->size = $request->post('size');
            $model->status = 1;
            $model->save();
            session()->flash('message',$msg);
            return redirect('admin/size');
    }


    public function delete(Request $request, $id)
    {
        $model = Size::find($id);
        $model->delete();
        session()->flash('danger', 'Size Has been deleted successfully.');
        return redirect('admin/size');
    }

    public function status(Request $request, $status, $id)
    {
        $model = Size::find($id);
        $model->status = $status;
        $model->save();
        session()->flash('danger', 'Status has been updated successfully.');
        return redirect('admin/size');
    }


}
