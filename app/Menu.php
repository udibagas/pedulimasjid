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
        $posts = Post::selectRaw('CONCAT("/post/", id, "-", REPLACE(title, " ", "-")) AS link, title AS label')->published()->page()->orderBy('label', 'ASC')->pluck('label', 'link')->toArray();

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

    public function scopeLeft($query)
    {
        return $query->where('placement', 'left');
    }

    public function scopeRight($query)
    {
        return $query->where('placement', 'right');
    }

    public function scopeFooter1($query)
    {
        return $query->where('placement', 'footer1');
    }

    public function scopeFooter2($query)
    {
        return $query->where('placement', 'footer2');
    }

    public function scopeFooter3($query)
    {
        return $query->where('placement', 'footer3');
    }

    public function scopeCopyright($query)
    {
        return $query->where('placement', 'copyright');
    }
}
