<?php namespace AuthEdge\Http\Controllers;

/**
 * Page Controller
 * 
 * @package QuarterUp
 * @subpackage Laravel
 * @version 1.0
 */ 
class PageController extends Controller {
	/**
	 * Home Page
	 */
	public function getIndex()
	{
		return view('pages.index');
	}
}
