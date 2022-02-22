<?php

namespace App\View\Components\user;

use Illuminate\View\Component;

class PostList extends Component
{
    public $posts;

    public $showControls;

    /**
     * Create a new component instance.
     * 
     * @param array $posts
     * @param array $showControls
     * @return void
     */
    public function __construct($posts, $showControls)
    {
        $this->posts = $posts;
        $this->showControls = $showControls;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user.post-list');
    }
}
