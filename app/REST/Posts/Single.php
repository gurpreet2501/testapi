<?php

namespace App\REST\Posts;
use Illuminate\Http\Request;
use App\Models as M;
use App\Factory\Response as Resp;
use Illuminate\Pagination\Paginator;

Class Single{
	
	public function regular(Request $request){
		$post_id = isset($request->data['id']) ? $request->data['id'] : ''; 	
		
		if(!$post_id)
			return Resp::errors(2);

		return M\Dggsjm_posts::find($post_id);

	}
}