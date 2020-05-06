<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\BaseRequest;

class ArticleUpdateRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => 'required|integer',
            'title' => 'required|string',
            'sub_title' => 'nullable|string',
            'author' => 'nullable|string',
            'summary' => 'nullable|string',
            'content' => 'required|string',
            'thumb' => 'nullable|string',
            'num_like' => 'integer',
            'num_view' => 'integer',
            'num_sort' => 'integer',
            'published_at' => 'required|string'
        ];
    }
}
