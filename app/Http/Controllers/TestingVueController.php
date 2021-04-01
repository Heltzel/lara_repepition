<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingVueController extends Controller
{
    // route in route.api
    public function index(){
        return [
            'name'=> 'Peete'
        ];
    }
}
