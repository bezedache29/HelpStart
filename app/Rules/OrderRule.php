<?php

namespace App\Rules;

use App\Models\Lesson;
use Illuminate\Contracts\Validation\Rule;

class OrderRule implements Rule
{

    private $course_id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($course_id)
    {
        $this->course_id = $course_id;
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
        // Si la condition est bonne, cad que la valeur d'order et l'id de la course ne sont pas identifiées ensemble, la validation est accépté
        // Sinon la condition n'est pas accepté et sera retourné avec la fonction message()
        return Lesson::where('order', $value)->where('course_id', $this->course_id)->exists() === false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Cet ordre est déjà utilisé dans ce cours';
    }
}
