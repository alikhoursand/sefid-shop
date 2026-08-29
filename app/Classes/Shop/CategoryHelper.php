<?php

namespace App\Classes\Shop;


use App\Models\Shop\Categories;

class CategoryHelper
{

    public function getRoots($count = null)
    {
        $query = Categories::where('parent_id', null);

        if ($count != null) {
            $query->take($count);
        }

        $categories = $query->get();

        $array = [];

        foreach ($categories as $category) {
            array_push($array, $category->id);
        }

        return $this->getTreeFromIds($array);
    }

    public function getTreeFromIds($categoryIds)
    {

        $categories = Categories::whereIn('id', $categoryIds)->get();
        $categoriesWithChildren = $this->nestCategories($categories);

        return $categoriesWithChildren;
    }

    private function nestCategories($categories)
    {
        foreach ($categories as $category) {
            $category->children = $this->nestCategories($category->children);
        }

        return $categories;
    }

    public function getAllCategoryIdsWithModels(array $categoryIds): array
    {
        $allIds = $categoryIds;
        $allCategories = Categories::whereIn('id', $categoryIds)->get();

        $children = Categories::whereIn('parent_id', $categoryIds)->get();

        if ($children->isNotEmpty()) {
            $childResult = $this->getAllCategoryIdsWithModels($children->pluck('id')->toArray());

            $allIds = array_merge($allIds, $childResult['ids']);
            $allCategories = $allCategories->merge($childResult['models']);
        }

        return [
            'ids' => array_unique($allIds),
            'models' => $allCategories->unique('id'),
        ];
    }


    public function getTree($category_id = null)
    {
        if ($category_id != null) {
            $categories = Categories::with('children')->find($category_id);
            $categoriesWithChildren = $this->nestCategories([$categories]);
        } else {
            $categories = Categories::where([
                ['parent_id', null],
                ['menu', 1]
            ])->with('children')->get();

            $categoriesWithChildren = $this->nestCategories($categories);
        }

        return $categoriesWithChildren;
    }
}
