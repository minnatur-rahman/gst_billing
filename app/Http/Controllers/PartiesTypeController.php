<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PartiesTypeController extends Controller
{
    public function parties_type()
    {
      return view('admin.parties_type.list');
    }
}
