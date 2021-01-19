<?php

namespace App;

class OfferTypes
{
    const JUST_VIDEOS = 'just_videos';
    const FULL_ASSIST = 'full_assist';

    public function all() {
        return [self::JUST_VIDEOS, self::FULL_ASSIST];
    }
}
