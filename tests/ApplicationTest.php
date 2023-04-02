<?php

use PHPUnit\Framework\TestCase;

class ApplicationTest extends TestCase
{
    public function testSortByUpdatedAt() 
    {
        $article0 = (new \App\Entity\Article)->setUpdatedAt(null);
        $article1 = (new \App\Entity\Article)->setUpdatedAt(new DateTime('2023-04-01 12:15:13'));
        $article2 = (new \App\Entity\Article)->setUpdatedAt(new DateTime('2023-04-02 22:15:13'));
        $article3 = (new \App\Entity\Article)->setUpdatedAt(new DateTime('2023-04-02 23:00:00'));
        $article4 = (new \App\Entity\Article)->setUpdatedAt(null);

        $expectedArray = array();
        array_push($expectedArray,
            $article3,
            $article2,
            $article1,
            $article0,
            $article4
        );

        $articles = array();
        array_push($articles,
            $article1,
            $article2,
            $article3,
            $article4,
            $article0
        );

        $sortArticles = new \App\Common\SortArticles;
        $result = $sortArticles->sortByUpdatedAt($articles);

        $this->assertEquals($expectedArray, $result);
    }

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