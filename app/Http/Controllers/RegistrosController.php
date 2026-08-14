<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
class LogController extends Controller
{
    /*REGISTRA LOGS DEPENDIENDO DE LA NECESIDAD*/
    protected $date;

    /**
     * LogController constructor.
     * @param $date
     */
    public function __construct($date=null)
    {
        $this->date = \Carbon\Carbon::now()->format('Y-m-d');
    }
    public static function SaveRecord($filename,$data=[],$chanel="none"){
        $logfile = new Logger($chanel);
        $logfile->pushHandler(new StreamHandler($filename), Logger::INFO);
        $logfile->info('',$data,'');
    }

    public function ArgumentoInvalido($texto){

        $fulldate = \Carbon\Carbon::now()->format('Y-m-d G:ia');
        $date = \Carbon\Carbon::now()->format('Y-m-d');
        $filename = base_path("storage/logs/sql/sql-$date.log");
        $log = ['Hora'=>$fulldate,'Texto' => $texto];
        LogController::SaveRecord($filename,$log,'SQL');

    }  public static function General($dato=[]){

        $fulldate = \Carbon\Carbon::now()->format('Y-m-d G:ia');
        $date = \Carbon\Carbon::now()->format('Y-m-d');
        $filename = base_path("storage/logs/sql/sql-$date.log");
        $dato['Hora']=$fulldate;
        LogController::SaveRecord($filename,$dato,'SQL');

    }
    public static function Chat($ip,$usuario,$servicio,$mensjae,$status="fallido"){
        $fulldate = \Carbon\Carbon::now()->format('Y-m-d G:ia');
        $date = \Carbon\Carbon::now()->format('Y-m-d');
        $filename = base_path("storage/logs/chats/chat-$date.log");
        $log = ['Hora'=>$fulldate,'Ip' => $ip, 'Usuario' => $usuario, 'Status' => $status, ];
        LogController::SaveRecord($filename,$log,'chat');
    }



}
