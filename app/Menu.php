<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Post;

class Menu extends Model
{
    public $fillable = ['label', 'link', 'placement'];

    public static function getMenuList()
    {
        $posts = Post::selectRaw('CONCAT("/post/", id, "-", REPLACE(title, " ", "-")) AS link, title AS label')->ofStatus(Post::STATUS_PUBLISHED)->ofType(Post::TYPE_PAGE)->orderBy('label', 'ASC')->pluck('label', 'link')->toArray();

        $categories = Category::selectRaw('CONCAT("/category/", id, "-", REPLACE(name, " ", "-")) AS link, name AS label')->orderBy('label', 'ASC')->pluck('label', 'link')->toArray();

        return [
            'Page' => $posts,
            'Category' => $categories
        ];
    }

    public static function getPlacementList()
    {
        return [
            'left'      => 'Left',
            'right'     => 'Right',
            'footer1'   => 'Footer 1',
            'footer2'   => 'Footer 2',
            'footer3'   => 'Footer 3',
            'copyright' => 'Copyright',
        ];
    }

    public function scopeOfPlacement($query, $placement)
    {
        return $query->where('placement', $placement);
    }

}
