<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParentController extends Controller
{
    public function index()
    {
        $parentName = "Koler";
        $childName = "Zoilo Tomaki";

        $attendances = [
            [
                'date' => 'Mon, 2025 July 14',
                'time_in' => '-- : --',
                'time_out' => '-- : --',
                'status' => 'Absent'
            ],
            [
                'date' => 'Tue, 2025 July 15',
                'time_in' => '09:30 AM',
                'time_out' => '04:30 PM',
                'status' => 'Present'
            ],
        ];

        return view('attendance', compact('parentName', 'childName', 'attendances'));
    }
}
