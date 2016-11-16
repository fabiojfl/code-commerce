<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Frete;

class AdminFretesController extends Controller
{
    public function __construct(Frete $fretes)
	{
		$this->frete = $fretes;
	}
}
