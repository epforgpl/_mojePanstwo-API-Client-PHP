<?php
/**
 * Created by PhpStorm.
 * User: adamciezkowski
 * Date: 03/12/13
 * Time: 13:21
 */

namespace MP\Dane;


class Twitter extends DocDataObject
{

    protected $_fields = array(
        'date' => 'czas_utworzenia',
        'time' => 'czas_utworzenia',
        'title' => 'html',
    );

    public function getLabel()
    {
        $output = '<strong>';
        $output .= ($this->getData('usuniety') == '1') ? 'Usunięty tweet' : 'Tweet';
        $output .= '</strong>';


        $account_name = $this->getData('twitter_user_name');
        $account_href = 'https://twitter.com/' . $this->getData('twitter_user_screenname');
        if ($this->getData('twitter_accounts.id')) {
            $account_name = $this->getData('twitter_accounts.name');
            $account_href = '/dane/twitter_accounts/' . $this->getData('twitter_accounts.id');
        }


        $output .= ' od <a href="' . $account_href . '">' . $account_name . '</a>';

        return $output;
    }

    public function getShortTitle()
    {
        return false;
    }


    public function getThumbnailUrl($size = false)
    {
        $url = $this->getData('twitter_user_avatar_url');
        if (!$url)
            $url = $this->getData('twitter_accounts.profile_image_url');

        return str_replace('normal', 'bigger', $url);
    }

    public function hasHighlights()
    {
        return false;
    }


} 