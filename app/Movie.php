<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Exception;

class Movie extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'year', 'category_id',
    ];


    /**
     * Get the agency that the contact belongs.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * @return array
     * @throws Exception
     */
    public function GetAll()
    {
        $items = $this->with('category')->orderBy('name', 'asc')->get();

        $this->getException($items, 'There are not movies.');

        return $items;
    }

    /**
     * @param $request
     * @return mixed
     * @throws Exception
     */
    public function createItem($request)
    {
        $item = $this->create($request)->toArray();

        $this->getException($item, 'Error! Movie is not created!');

        return $item;
    }

    /**
     * @param $request
     * @return mixed
     * @throws Exception
     */
    public function updateItem($request)
    {
        $item = $this->update($request);

        $this->getException($item, 'Error! Movie is not updated!');

        return $item;
    }

    /**
     * @return bool|null
     * @throws Exception
     */
    public function deleteItem()
    {
        $item = $this->delete();

        $this->getException($item, 'Error! Movie is not deleted!');

        return $item;
    }

    /**
     * @param $item
     * @param $message
     * @throws Exception
     */
    protected function getException($item, $message)
    {
        if (!$item) {
            throw new Exception ($message);
        }
    }
}
