<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $table ='settings';
    public $guarded ='[]';


    public function getFooterInfo(){
		return \DB::select("SELECT
		        distinct(page), pages.title AS title, pages.slug AS slug
		    FROM footer
		    LEFT JOIN pages
		    ON footer.page = pages.id
		    WHERE footer.type = 1");
    }

    public function getFooterHelp(){
		return \DB::select("SELECT
		        distinct(page), pages.title AS title, pages.slug AS slug
		    FROM footer
		    LEFT JOIN pages
		    ON footer.page = pages.id
		    WHERE footer.type = 2");
    }


}
