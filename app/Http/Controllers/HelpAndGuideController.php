<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateHelpAndGuidesRequest;
use App\Models\HelpAndGuide;

class HelpAndGuideController extends Controller
{
    // get details from Help And Guidetable
    public function getHelpAndGuide()
    {
        $posts = HelpAndGuide::all();
        return response()->json($posts);
    }
// store details to table
    public function createHelpAndGuideC(UpdateHelpAndGuidesRequest $request)
    {
        $post_data = [];
        $post_data['user_id'] = $request->get('user_id');
        $post_data['link'] = $request->get('link');
        $post_data['description'] = $request->get('description');
        $save = HelpAndGuide::create($post_data);
        return response()->json($save, 200);
    }
}
