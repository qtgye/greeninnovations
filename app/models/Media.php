<?php namespace models;

use \core\model;

/*
 * model - the base model
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */

class Media extends Model {

    protected $fillable = [
        'file_name',
        'file_type',
        'title',
        'description',
        'size',
        'meta1',
        'meta2',
        'meta3'
    ];

    public static $rules = [
        'file_name' => 'required'
    ];

    public static $plural = 'Media';

    public function __construct ($data = [])
    {
        parent::__construct($data);

        $this->table = 'media';
    }

    private function queryImages ()
    {        
        return $this->_db->select("SELECT * FROM " . PREFIX . $this->table . " WHERE file_type = :file_type ORDER BY created_at DESC",
                [ ':file_type' => 'image' ] );
    }

    // public function scopePdf ($query)
    // {
    //     return $query->where('file_type','pdf');
    // }

    // public function products ()
    // {
    //     return $this->hasMany('\App\Product');
    // }    

    public static function images()
    {
        $instance = new static();
        return $instance->queryImages();
    }

    public static function upload($file, $meta = [])
    {
        $uploads_dir = public_path() . '/uploads';
        $uploaded = null;       
        $original_file_name = $file->getClientOriginalName();
        $size = $file->getSize();   
        $unique = md5($original_file_name . time());
        $file_name = $unique . '_' . $original_file_name;

        if ( $file->move($uploads_dir,$file_name) ) {

            $meta['title'] = !empty($meta['title']) ? $meta['title'] : $original_file_name;
            $data = compact('file_name','file_type','size');
            $data = array_merge($data,$meta);

            $uploaded = static::create($data);
        }

        return !is_null( $uploaded ) ? $uploaded : null;

    }


}
