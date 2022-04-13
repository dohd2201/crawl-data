<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\Product;
use Illuminate\Console\Command;
use Weidner\Goutte\GoutteFacade;

class ScrapePost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:post';

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
        $url = "https://dantri.com.vn/kinh-doanh/sri-lanka-tuyen-bo-vo-no-toan-bo-51-ty-usd-no-nuoc-ngoai-20220412160108862.htm";
        $crawler = GoutteFacade::request('GET', $url);
        $title = $crawler->filter('h1.title-page')->each(function ($node) {
            return $node->text();
        })[0];
        $description = $crawler->filter('h2.singular-sapo')->each(function ($node) {
            return $node->text();
        })[0];
        $content = $crawler->filter('div.singular-content')->each(function ($node) {
            return $node->text();
        })[0];
        $image = $crawler->filter('figure.image > img')->each(function ($node) {
            return $node->attr('src');
        })[0];
        \printf($image);
        $post = new Post;
        $post->title = $title;
        $post->description = $description;
        $post->content = $content;
        $post->image = $image;
        $post->save();
    //    $url = 'https://www.thegioididong.com/dtdd';
    //    $crawler = GoutteFacade::request('GET', $url);
    //    $crawler->filter('ul.listproduct > li.item')->each(function ($node) {
    //            $name = $node->filter('h3')->text();
    //            $price = $node->filter('.price')->text();
    //            $image = $node->filter('.item-img > img')->attr('src');

    //            $product = new Product;
    //            $product->name = $name;
    //            $product->price = $price;
    //            $product->image = $image;
    //            $product->save();
    //        }
    //    );
    }
}
