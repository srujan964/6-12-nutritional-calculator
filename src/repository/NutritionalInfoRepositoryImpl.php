<?php

declare(strict_types=1);

namespace App\Repository;

use PDO;
use App\Repository\NutritionalInfoRepository;

class NutritionalInfoRepositoryImpl implements NutritionalInfoRepository
{

    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function findByIngredientIds(array $ingredientIds)
    {
        $sql = "SELECT * FROM nutritional_info WHERE ingredient_id IN (" . implode(',', array_fill(0, count($ingredientIds), '?')) . ")";
        $select = $this->db->prepare($sql);
        $select->execute($ingredientIds);

        $results = $select->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $result) {
            $nutritionalInfo =  [
                'calories' => $result['calories'],
                'carbohydrates' => $result['carbohydrates'],
                'protein' => $result['protein'],
                'sodium' => $result['sodium'],
                'fats' => $result['fats'],
                'saturated_fats' => $result['saturated_fats'],
                'trans_fats' => $result['trans_fats'],
                'sugars' => $result['sugars'],
                'added_sugars' => $result['added_sugars'],
                'cholesterol' => $result['cholesterol'],
                'vitamin_d' => $result['vitamin_d'],
                'calcium' => $result['calcium'],
                'potassium' => $result['potassium'],
                'iron' => $result['iron']
            ];

            $nutritionalInfoObjects[$result['ingredient_id']] = $nutritionalInfo;
        }
        return $nutritionalInfoObjects;
    }
}
