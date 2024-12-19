<?php

declare(strict_types=1);

namespace App\Model;

use JsonSerializable;

use function Safe\ingres_close;

class NutritionalInfo implements JsonSerializable
{
    private int $ingredient_id;
    private int $calories;
    private int $carbohydrates;
    private int $protein;
    private int $sodium;
    private int $fats;
    private int $saturated_fats;
    private int $trans_fats;
    private int $sugars;
    private int $added_sugars;
    private int $cholesterol;
    private int $vitamin_d;
    private int $calcium;
    private int $potassium;
    private int $iron;

    public function __construct(
        int $ingredient_id,
        int $calories,
        int $carbohydrates,
        int $protein,
        int $sodium,
        int $fats,
        int $saturated_fats,
        int $trans_fats,
        int $sugars,
        int $added_sugars,
        int $cholesterol,
        int $vitamin_d,
        int $calcium,
        int $potassium,
        int $iron
    ) {
        $this->ingredient_id = $ingredient_id;
        $this->calories = $calories;
        $this->carbohydrates = $carbohydrates;
        $this->protein = $protein;
        $this->sodium = $sodium;
        $this->fats = $fats;
        $this->saturated_fats = $saturated_fats;
        $this->trans_fats = $trans_fats;
        $this->sugars = $sugars;
        $this->added_sugars = $added_sugars;
        $this->cholesterol = $cholesterol;
        $this->vitamin_d = $vitamin_d;
        $this->calcium = $calcium;
        $this->potassium = $potassium;
        $this->iron = $iron;
    }

    public function jsonSerialize(): mixed
    {
        return [
            $this->ingredient_id => [
                'calories' => $this->calories,
                'carbohydrates' => $this->carbohydrates,
                'protein' => $this->protein,
                'sodium' => $this->sodium,
                'fats' => $this->fats,
                'saturated_fats' => $this->saturated_fats,
                'trans_fats' => $this->trans_fats,
                'sugars' => $this->sugars,
                'added_sugars' => $this->added_sugars,
                'cholesteorl' => $this->cholesterol,
                'vitamin_d' => $this->vitamin_d,
                'calcium' => $this->calcium,
                'potassium' => $this->potassium,
                'iron' => $this->iron
            ]
        ];
    }
}
