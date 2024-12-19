<?php

declare(strict_types=1);

namespace App\Service;

use App\Repository\NutritionalInfoRepository;

class NutritionalInfoService
{
    private NutritionalInfoRepository $repository;

    public function __construct(NutritionalInfoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function summarize(array $menuSelections)
    {
        $ingredientSelections = [];
        foreach ($menuSelections as $item) {
            $ingredientSelections = array_merge($ingredientSelections, array_column($item['ingredient_selections'], 'ingredient_id'));
        }
        $ingredients = array_unique($ingredientSelections, SORT_NUMERIC);
        $results = $this->repository->findByIngredientIds(array_values($ingredients));

        $nutritional_summary = [];

        foreach ($menuSelections as $menu_item) {
            $summary = [
                'item_id' => $menu_item['item_id'],
                'name' => $menu_item['name'],
                'image_url' => $menu_item['image_url'],
                'total' => [
                    'calories' => 0,
                    'carbohydrates' => 0,
                    'protein' => 0,
                    'sodium' => 0,
                    'fats' => 0,
                    'saturated_fats' => 0,
                    'trans_fats' => 0,
                    'sugars' => 0,
                    'added_sugars' => 0,
                    'cholesterol' => 0,
                    'vitamin_d' => 0,
                    'calcium' => 0,
                    'potassium' => 0,
                    'iron' => 0
                ]
            ];

            foreach ($menu_item['ingredient_selections'] as $ingredient_selection) {
                if ($ingredient_selection['is_selected']) {
                    $ingredient_id = $ingredient_selection['ingredient_id'];

                    // Add the nutritional values of the selected ingredient to the summary
                    foreach ($results[$ingredient_id] as $key => $value) {
                        $summary['total'][$key] += $value;
                    }
                }
            }

            // Add the summary to the final array using the item_id as the key
            $nutritional_summary['selections'][] = $summary;
        }

        $total_summary = [
            'calories' => 0,
            'carbohydrates' => 0,
            'protein' => 0,
            'sodium' => 0,
            'fats' => 0,
            'saturated_fats' => 0,
            'trans_fats' => 0,
            'sugars' => 0,
            'added_sugars' => 0,
            'cholesterol' => 0,
            'vitamin_d' => 0,
            'calcium' => 0,
            'potassium' => 0,
            'iron' => 0
        ];

        // Iterate over the nutritional summary for each menu item
        foreach ($nutritional_summary['selections'] as $menu_item) {
            // Add each value from the menu item's total to the overall total
            foreach ($menu_item['total'] as $key => $value) {
                $total_summary[$key] += $value;
            }
        }

        $nutritional_summary['summary'] = $total_summary;
        return $nutritional_summary;
    }
}
