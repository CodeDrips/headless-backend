<?php

namespace App\Composers;

use Roots\Acorn\View\Composer;

class Header extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.header',
    ];

    public function with()
    {
        return [
            'img_url' => get_attachment_image_url(get_post_thumbnail_id()),
            'class' => 'hero',
            'title' => $post->post_title,
        ];
    }

}
