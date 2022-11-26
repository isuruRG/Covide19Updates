<?php

namespace App\Http\Controllers;

use App\Models\CovidDetail;
use Illuminate\Http\Request;

class CovidDetailsController extends Controller
{
    public function getCovidDetails()
    {
        $posts = CovidDetail::latest('created_at')->first();
        return response()->json($posts);
    }
}
