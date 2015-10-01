<?php
/**
 * Created by PhpStorm.
 * User: hlogeon
 * Date: 10/1/15
 * Time: 3:10 PM
 */

namespace App\Http\ViewComposers;


use App\Feedback;
use Illuminate\View\View;

class LastFeedbackComposer {

    protected $lastFeedback;

    public function __construct()
    {
        $this->lastFeedback = Feedback::where('status', 1)->orderBy('created_at', 'desc')->limit(5)->get();
    }

    public function compose(View $view)
    {
        $view->with('reviews', $this->lastFeedback);
    }


}