<?php

namespace App\Console\Commands;

use App\Models\Brand;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\Tire;
use Illuminate\Console\Command;

class TireCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:code';

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
        $tires = Tire::all();

        foreach ($tires as $tire) {
            $tire->update(['code' => $this->generate_code($tire)]);
        }

        return Command::SUCCESS;
    }

    private function generate_code($tire)
    {
        $brand = Brand::findOrFail($tire->brand()->id);
        $number = $brand->tires->count();

        $first = sprintf("%02d", $tire->main_category_id);
        $second = sprintf("%02d", $tire->brand()->id);
        $third = sprintf("%03d", $tire->id);

        $combined = $first . $second . $third;

        return intval($combined);
    }

    private function product_code($tire)
    {
        $first = sprintf("%02d", $tire->main_category_id);
        $third = sprintf("%05d", $tire->id);

        $combined = $first . $third;
        return intval($combined);
    }

}
