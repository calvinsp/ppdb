<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
class apiController extends Controller{

    public function index() {
        {
            $result = DB::table('pendaftar')->get();
        return  response([
            'success' => true,
            'message' => 'Data Semua Kategori',
            'data' => $result
        ], 200);
    }

        }
    }




