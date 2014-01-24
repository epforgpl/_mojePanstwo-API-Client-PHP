<?php
/**
 * Created by PhpStorm.
 * User: adamciezkowski
 * Date: 03/12/13
 * Time: 13:21
 */

namespace MP\Dane;


class Twitter_tags extends DocDataObject
{
    public function getLabel()
    {
        return 'Hashtag w tweetach posłów';
    }

    public function getTitle()
    {
        return $this->getShortTitle();
    }

    public function getShortTitle()
    {
        return $this->getData('tag');
    }
} 