<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function toJson($response)
	{
	    $json = array('error' => false, 'data' => array(), 'html' => '');

	    if($response instanceof Illuminate\View\View) {
	        $json['html'] = $response->render();
	    } elseif($response instanceof Exception) {
	        $json['error'] = $response->getMessage();
	    } else {
	        $json['data'] = $response;
	    }
	    return Response::json($json);
	}

}
