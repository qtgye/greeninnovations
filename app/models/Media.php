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
        $uploads_dir = dirname(APP_DIR) . '/uploads/';
        $uploaded = null;       
        $original_file_name = $file['name'];
        $size = $file['size'];   
        $unique = md5($original_file_name . time());
        $file_name = $unique . '_' . $original_file_name;

        if ( move_uploaded_file($file['tmp_name'], $uploads_dir . $file_name) ) {     
            $meta['title'] = !empty($meta['title']) ? $meta['title'] : $original_file_name;
            $meta['file_type'] = !empty($meta['file_type']) ? $meta['file_type'] : self::get_file_type($original_file_name);
            $data = compact('file_name','file_type','size');
            $data = array_merge($data,$meta);
            $uploaded = static::create($data);
            $uploaded->save();
        }

        return !is_null( $uploaded ) ? $uploaded : null;

    }

    public static function get_file_type ($filename)
    {
        if ( preg_match('/[.](jpg|jpeg|png|gif|bmp|ico)$/i', $filename) ) {
            return 'image';
        }
        else if ( preg_match('/[.](mp4|mpeg|avi|mov|3gp|wmv|mkv)$/i', $filename) ) {
            return 'video';
        }
        else if ( preg_match('/[.](wav|mp3|wma)$/i', $filename) ) {
            return 'audio';
        }
        else if ( preg_match('/[.](doc|docx|txt)$/i', $filename) ) {
            return 'document';
        }
        else if ( preg_match('/[.](pdf)$/i', $filename) ) {
            return 'pdf';
        }
        return 'other';
    }


}
