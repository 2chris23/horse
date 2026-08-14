<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $columns =[
            'id'=>"#",
            'asunto'=>trans('notification.contact'),
            'asunto'=>trans('notification.asunto'),
            'correo'=>trans('notification.correo'),
            'numero'=>trans('notification.numero'),
            'mensaje'=>trans('notification.mensaje'),
            'other'=>trans('notification.other'),
            'created_at'=>trans('notification.created_at'),
        ];
        $u = \Auth::user();
        //$notification = $u->getNotifications();

        //$notification = Notification::where('users_id', $u->id)->orderby('id', 'desc')->paginate(20);
        $notification = Notification::ObtenerNotificaciones($u)->orderby('id', 'desc')->paginate(20);
        $notiso = Notification::ObtenerNuevasNotificaciones($u, 0)->orderby('id', 'desc')->paginate(20);

        return view('backend.content.notification.index', compact('notification', 'notiso', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $columns =[
            'id'=>"#",
            'asunto'=>trans('notification.contact'),

            'asunto'=>trans('notification.asunto'),
            'other'=>trans('notification.other'),
            'correo'=>trans('notification.correo'),
            'numero'=>trans('notification.numero'),
            'mensaje'=>trans('notification.mensaje'),

            'created_at'=>trans('notification.created_at'),
        ];

        $notification = Notification::find($id);

        return view('backend.content.notification.show',compact('notification','columns'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function MarcarVisto(Notification $notification)
    {

        $user = \Auth::user();
        //'users_id',
        if ($notification->users_id == $user->id) {
            $notification->MarcarVisto()->push();

        }
        return $notification->id;

    }
}

