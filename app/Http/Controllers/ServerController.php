<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Morse\Text as MorseText;



class ServerController extends Controller
{

    public function call($command)
    {
        $data = Curl::to('http://ik.olleco.net/morse-api')
            ->withData(array('command' => $command))
            ->post();

        return json_decode($data);
    }



    public function index()
    {


        $cpu = $this->call('-.-. .--. ..-');

        $arch = $this->call('.- .-. -.-. ....');

        $freeMem = $this->call('..-. .-. . . -- . --');

        $hostname = $this->call('.... --- ... - -. .- -- .');

        $platform = $this->call('.--. .-.. .- - ..-. --- .-. --');

        $totalMem = $this->call('- --- - .- .-.. -- . --');

        $type = $this->call('- -.-- .--. .');

        $upTime = $this->call('..- .--. - .. -- .');


        $datum = [
            'cpu' => $cpu,
            'arch' => $arch,
            'freeMem' => $freeMem,
            'hostname' => $hostname,
            'platform' => $platform,
            'totalMem' => $totalMem,
            'type' => $type,
            'upTime' => $upTime,
            'text' => new MorseText() // Translate from Morse Alphabet
        ];


        return view('home', $datum);

    }
}
