<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index(Request $request)
    {
      $perPage = $request->input('perPage', 10); // Default 10 jika tidak ada input
      $admin = Admin::paginate($perPage);
      
      return view('admin.index', compact('admin', 'perPage'));
    }
}
