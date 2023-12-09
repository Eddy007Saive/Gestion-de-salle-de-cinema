<?php

namespace App\Rules;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Rule;

class unique_hours_for_date implements Rule
{
    protected $date;
    protected $salle;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($date, $salle)
    {

        $this->date = $date;
        $this->salle = $salle;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $table = DB::table('Horaires')->join("salles", "salles.id", "=", "salle_id")
            ->where("heureD", $value)
            ->where("DateD", $this->date)
            ->where("Salle_id", $this->salle)
            ->doesntExist();

        return $table;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "l'heure  et la salle ".$this->salle."est déja prise pour cette date";
    }
}
