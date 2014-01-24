<?php
/**
 * Created by PhpStorm.
 * User: adamciezkowski
 * Date: 03/12/13
 * Time: 13:21
 */

namespace MP\Dane;


class Twitter_accounts extends DocDataObject
{

    protected $_fields = array(
        'title' => 'name',
        'shortTitle' => 'name',
    );

    public function getShortTitle()
    {
        return $this->getData('name') . ' <span class="small text-muted">(@' . $this->getData('twitter_name') . ')</span>';
    }

    public function getLabel()
    {
        return 'Konto na Twitterze';
    }

    public function getThumbnailUrl($size = false)
    {
        $url = $this->getData('profile_image_url');
        return str_replace('normal', 'bigger', $url);
    }

    public function hasHighlights()
    {
        return false;
    }
} 