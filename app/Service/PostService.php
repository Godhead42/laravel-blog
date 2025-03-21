<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {

            DB::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tagIds = (array) $data['tag_ids']; // Преобразуем в массив
                unset($data['tag_ids']);
            } else {
                $tagIds = []; // Если тегов нет, передаем пустой массив
            }

            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            $post = Post::firstOrCreate($data);

            if (isset($tagIds)) {
                $post->tags()->attach($tagIds);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

    }

    public function update($data, Post $post)
{
    try {
        DB::beginTransaction();


        if (isset($data['tag_ids'])) {
            $tagIds = (array) $data['tag_ids']; // Преобразуем в массив
            unset($data['tag_ids']);
        } else {
            $tagIds = []; // Если тегов нет, передаем пустой массив
        }


        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }
        if (isset($data['main_image'])) {
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
        }


        $post->update($data);

        $post->tags()->sync($tagIds);

        DB::commit();

    } catch (\Exception $exception) {
        DB::rollBack();
        abort(500);
    }

    return $post;
}


}
