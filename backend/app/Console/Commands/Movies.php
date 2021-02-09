<?php

namespace App\Console\Commands;

use App\Repositories\MoviesRepository;
use Illuminate\Console\Command;

class Movies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'movies:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info("Fetching movies!");
        $movieRepo = new MoviesRepository();
        $movieRepo->fetchTopMovies();
        $this->info("Fetching done!");
    }
}
