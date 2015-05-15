<?php

Class AjaxController extends BaseController {

	public function toJson($response)
	{
	    $json = array('error' => false, 'data' => array(), 'html' => '');

	    if($response instanceof Illuminate\View\View) {
	        $json['html'] = $reponse->render();
	    } elseif($response instanceof Exception) {
	        $json['error'] = $response->getMessage();
	    } else {
	        $json['data'] = $response;
	    }
	    return Response::json($json);
	}
}