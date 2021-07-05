<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
class HashController extends Controller{

    public function index() {
        {
            // Validate the new password length...

            $request = Hash::make('qwerty');
            echo $request;
        }
    }


}
