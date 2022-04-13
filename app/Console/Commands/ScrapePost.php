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
        $url = "https://dantri.com.vn/tam-long-nhan-ai/lay-lat-canh-song-cua-nhung-dua-tre-mo-coi-cha-trong-can-nha-sap-sap-20220408161206111.htm";
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
    }
}
