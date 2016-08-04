<?php

namespace App\REST\Posts;
use App\Models as M;
use Illuminate\Pagination\Paginator;

Class All{
	
	public function regular($page = null){
		
		Paginator::currentPageResolver(function() use ($page) {
		    return $page;
		});

		return M\Dggsjm_posts::paginate(15);

	}
}