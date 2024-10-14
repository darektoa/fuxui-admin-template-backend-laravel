<?php

namespace  App\Traits\Model;

use App\Helpers\CollectionHelper;
use Illuminate\Support\Str;

trait CamelCaseAttributes {
    /**
     * Indicates whether attributes are snake cased on arrays.
     *
     * @var bool
     */
    public static $snakeAttributes = true;

    
    /**
     * Convert the model's attributes to an array.
     *
     * @return array
     */
    public function attributesToArray()
    {
        $attributes = parent::attributesToArray();

        return CollectionHelper::camelKeys($attributes)->toArray();
    }


    /**
     * Fill the model with an array of attributes.
     *
     * @param  array  $attributes
     * @return $this
     *
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function fill(array $attributes)
    {
        $snakeAttributes = CollectionHelper::snakeKeys($attributes);

        return parent::fill($snakeAttributes->toArray());
    }


    /**
     * Get an attribute from the model.
     *
     * @param string $key
     * @return bool
     */
    public function hasRelationOrMethod(string $key): bool
    {
        return (
            array_key_exists($key, $this->relations)
            || method_exists($this, $key)
        );
    }


    /**
     * Get an attribute from the model.
     *
     * @param string $key
     * @return mixed
     */
    public function getAttribute($key)
    {
        if($this->hasRelationOrMethod($key))
            return parent::getAttribute($key);

        return parent::getAttribute(Str::snake($key));
    }


    /**
     * Set a given attribute on the model.
     *
     * @param string $key
     * @param mixed $value
     * @return mixed
     */
    public function setAttribute($key, $value)
    {
        return parent::setAttribute(Str::snake($key), $value);
    }
}
