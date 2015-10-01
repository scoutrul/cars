<?php namespace App\Console\Commands;

use App\Feedback;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class SlugForFeedback extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'feedback:sluggify';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		$feedback = Feedback::all();
        foreach($feedback as $feed){
            $feed->save();
        }
	}

}
