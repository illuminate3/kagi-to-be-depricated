<?php

namespace App\Modules\Core\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Theme;


class KagiController extends Controller
{


	use DispatchesJobs, ValidatesRequests;

	/**
	 * Initializer.
	 *
	 * @return \CoreController
	 */
	public function __construct()
	{
/*
		parent::__construct();
		$this->middleware('csrf');
		$this->middleware('auth');
*/
// middleware
		$this->middleware('auth');
		$this->middleware('admin');
	}


	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function welcome()
	{
		return Theme::View('modules.core.general');
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Theme::View('modules.core.landing');
	}


}