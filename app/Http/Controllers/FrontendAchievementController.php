<?php

namespace App\Http\Controllers;

use App\Models\Achievement;

class FrontendAchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::latest('created_at')->get();
        return view('achievements', compact('achievements'));
    }
}
