<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Exception;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];


    /**
     * Get the contacts belongs to agencies.
     */
    public function movies()
    {
        return $this->hasMany('App\Movie');
    }

    /**
     * @return array
     * @throws Exception
     */
    public function GetAll()
    {
        $items = $this->orderBy('name', 'asc')->get();

        $this->getException($items, 'There are not genres.');

        return $items;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function GetMoviesByCategory()
    {
        $items = $this->movies;

        $this->getException($items, 'No movies.');

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

        $this->getException($item, 'Error, the genre is not created!');

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

        $this->getException($item, 'Error, the genre is not updated!');

        return $item;
    }

    /**
     * @return bool|null
     * @throws Exception
     */
    public function deleteItem()
    {
        $item = $this->delete();

        $this->getException($item, 'Error! The genre is not deleted!');

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
