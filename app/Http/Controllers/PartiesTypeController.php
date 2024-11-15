<?php

namespace App\Http\Controllers;

use App\Models\PartiesTypeModel;
use Illuminate\Http\Request;

class PartiesTypeController extends Controller
{
    public function parties_type()
    {
      return view('admin.parties_type.list');
    }

    public function parties_type_add()
    {
      return view('admin.parties_type.add');
    }

    public function parties_type_insert(Request $request)
    {
      // dd($request->all());
      $save = new PartiesTypeModel();
      $save->parties_type_name = trim($request->parties_type_name);
      $save->save();

      return redirect('admin/parties_type')->with('success', 'Record successfully create.');
    }
}
