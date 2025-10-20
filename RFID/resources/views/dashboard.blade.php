@extends('layouts.app')

@section('title', 'Dashboard - RFID System')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@section('content')
    <div class="stats">
    <div class="stat-box blue">Attendance Rate: 100%</div>
    <div class="stat-box yellow">Students Present: 99</div>
    <div class="stat-box pink">Employees Present: 98</div>
    <div class="stat-box green">Recent Absences: 97%</div>
    </div>

    <table>
    <thead>
        <tr>
        <th>Date</th>
        <th>Name</th>
        <th>ID</th>
        <th>Time In</th>    
        <th>Time Out</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>14 July 2025</td>
        <td>Bene Dicto</td>
        <td>2020 - 12345</td>
        <td>13:07</td>
        <td>13:07</td>
        </tr>
        <tr>
        <td>14 July 2025</td>
        <td>Cuh Ledge</td>
        <td>2020 - 12345</td>
        <td>13:14</td>
        <td>13:07</td>
        </tr>
    </tbody>
    </table>
@endsection