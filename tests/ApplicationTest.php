<?php

use PHPUnit\Framework\TestCase;

class ApplicationTest extends TestCase
{

    public function testCountArticleReadTime() 
    {
        $article = new \App\Entity\Article;
        $article->setTitle("First article");
        $article->setText("Arrived totally in as between private. 
            Favour of so as on pretty though elinor direct. 
            Reasonable estimating be alteration we themselves entreaties me of reasonably. 
            Direct wished so be expect polite valley.");

        $algo = new \App\Common\Algo;
        $result = $algo->countArticleReadTime($article);

        $expected = ceil(20 / 200);

        $this->assertEquals($expected, $result);
    }

    public function testCountTextWords() 
    {
        $algo = new \App\Common\Algo;
        $result = $algo->countTextWords("Text, is here. Isn't it easy?");

        $this->assertEquals(4, $result);
    }
}