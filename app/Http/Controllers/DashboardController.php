<?php
  namespace App\Http\Controllers;

  use App\Models\Pemeriksaan;
  use App\Models\Transaksi;

  class DashboardController extends Controller
  {
      public function index()
      {
            $totalpenghasilan =  Transaksi::sum('biaya');  

            return view('dashboard.index', compact('totalpenghasilan'));
      }
  }