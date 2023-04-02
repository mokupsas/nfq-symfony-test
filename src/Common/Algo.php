<?php

namespace App\Common;

use App\Entity\Article;

class Algo
{    
        
    /**
     * Counts how long is to read an article
     *
     * @param  App\Entity\Article $article
     * @return int read time in minutes
     */
    public static function countArticleReadTime(Article $article) : int
    {
        $words = self::countTextWords($article->getText());

        return ceil($words / 200);
    }

        
    /**
     * Counts how many words given text has
     *
     * @param  string $text text to count with
     * @return int words count
     */
    public static function countTextWords(string $text) : int
    {
        $words = 0; // total words found

        // Loop array of words exploded by space
        foreach(explode(" ", $text) as $word)
        {
            // Trims out characters and checks if text is
            // atleast 3 characters long
            if(strlen(trim($word, ",.!?")) >= 3) $words++;
        }

        return $words;
    }
}
