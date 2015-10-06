<?php namespace App;

use App\Models\IHasMetaTitleAndDescription;
use App\Models\THasMetaDescription;
use App\Models\THasMetaTitle;
use \SleepingOwl\Models\SleepingOwlModel as Model;

class Page extends Model implements IHasMetaTitleAndDescription{

    use THasMetaDescription, THasMetaTitle;

	protected $table = 'pages';

	protected $fillable = ['title', 'url', 'content', 'in_header', 'description', 'meta_title'];

}