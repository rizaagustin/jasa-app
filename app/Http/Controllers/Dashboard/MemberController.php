<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Support\facades\Storage;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// use File;
// use Alert;
// use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


use App\Models\User;
use App\Models\Service;
use App\Models\OrderStatuS;
use App\Models\Order;
use App\Models\DetailUser;
use App\Models\ExperienceUser;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::Where('freelancer_id',Auth::user()->id)->get();
        
        $progress = Order::Where('freelancer_id', Auth::user()->id)
                    ->Where('order_status_id',2)
                    ->count();

        $completed = Order::Where('freelancer_id', Auth::user()->id)
                    ->Where('order_status_id',1)
                    ->count();

        $freelancer = Order::Where('buyer_id', Auth::user()->id)
                    ->Where('order_status_id',2)
                    ->distinct('freelancer_id')
                    ->count();

        return view('pages.dashboard.index', compact('orders','progress','completed','freelancer'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }
}
