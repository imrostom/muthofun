<?php

namespace Imrostom\Muthofun\Controllers;

use Illuminate\Routing\Controller;
use Imrostom\Muthofun\Facade\Muthofun;
use Imrostom\Muthofun\Requests\MuthofunRequest;

class MuthofunController extends Controller
{
	public  $data = [];
	
    public function index()
    {
        return view('muthofun::index');
    }

    public function send(MuthofunRequest $request)
    {
        $requestArray = $request->all();
        unset($requestArray['_token']);

        $this->data = Muthofun::messages($requestArray)->send();
        return view('muthofun::index', $this->data);
    }
}
