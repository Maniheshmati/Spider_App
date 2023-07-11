<?php

namespace App\Exports;

use App\Http\Controllers\PostController;
use App\Models\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Post::select('id', 'user_id', 'title', 'body')->get();
    }
}
