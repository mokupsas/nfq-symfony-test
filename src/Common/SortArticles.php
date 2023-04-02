<?php

namespace App\Common;

class SortArticles
{    
    /**
     * Sorts array of articles desc by updatedAt field
     *
     * @param  array $articles array of articles
     * @return araay array sorted desc by updatedAt field
     */
    public static function sortByUpdatedAt($articles) : array
    {
        $updatedAtArray = array(); // array of updatedAt field values

        // Adding updatedAt field values to $updatedAtArray 
        foreach($articles as $key => $article)
        {
            $updatedAtArray[$key] = $article->getUpdatedAt();
        }
       
        // Sorting $articles by $updatedAtArray desc values
        array_multisort($updatedAtArray, SORT_DESC, $articles);
        
        return $articles;
    }
}
