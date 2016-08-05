<?php

namespace App\REST\Posts;
use App\Models as M;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

Class All{
	
	public function regular(Request $request){
		
		$page = isset($request->data['page']) ? $request->data['page'] : 1;

		Paginator::currentPageResolver(function() use ($page) {
		    return $page;
		});

		return M\Dggsjm_posts::paginate(15);

	}
}