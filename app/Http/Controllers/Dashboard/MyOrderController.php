<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;


use App\Http\Requests\Dashboard\Myorder\UpdateMyorderRequest;

use Illuminate\Support\facades\Storage;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

// use File;
// use Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


use App\Models\User;
use App\Models\Service;
use App\Models\OrderStatuS;
use App\Models\Order;
use App\Models\AdvantageUser;
use App\Models\AdvantageService;
use App\Models\thumbnailService;
use App\Models\Tagline;

class MyOrderController extends Controller
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
        $order = Order::Where('freelancer_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('pages.dashboard.order.index', compact('orders'));
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
    public function show(Order $order)
    {
        $service = Service::where('id', $order['service_id'])->first();
        $thumbnail = ThumbnailService::where('service_id', $order['service_id'])->get();
        $advantage_service = AdvantageService::where('service_id', $order['service_id'])->get();
        $advantage_user = ThumbnailService::where('service_id', $order['service_id'])->get();
        $tagline = Tagline::where('service_id', $order['service_id'])->get();

        return view('pages.dashboard.order.detail', compact('service','thubmnail','advantage_service', 'advantage_user','tagline'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('pages.dashboard.order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMyorderRequest $request, Order $order)
    {
        $data = $request->all();

        // file zip
        if (isset($data['file'])) {
            $data['file'] = $request->file('file')->store(
                'assets/order/attachment', 'public'
            );
        }

        $order = Order::find($order->id);
        $order->file = $data['file'];
        $order->note = $data['note'];
        $order->save();

        toast()->success('Submit order has been success');
        return redirect()->route('member.order.index');

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

    //custome

    public function accepted($id){
        $order = Order::find($id);
        $order->order_status_id = 2;
        $order->save();

        toast()->success('Accept order  has been success');

        return back();
    }

    public function rejected($id){
        $order = Order::find($id);
        $order->order_status_id = 3;
        $order->save();

        toast()->success('Accept order  has been success');

        return back();
    }

}
