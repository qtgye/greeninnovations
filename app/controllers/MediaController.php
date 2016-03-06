<?php namespace controllers;
use core\view,
    core\controller,
    \helpers\url,
    \helpers\session;

use \models\Media as Media;

/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class MediaController extends Controller {
    
    public function store ()
    {
        global $input;
        $post_max = (integer) trim(ini_get('post_max_size'),'M');
        $upload_max =  (integer) trim(ini_get('upload_max_filesize'),'M');
        $upload_limit = $post_max < $upload_max ? $post_max : $upload_max;
        // size in MB
        $upload_limit *= 1048576;

        $response = [
            'success' => false,
            'data' => null
        ];
        $file = $_FILES['file'];

        // Check file size
        if ( $file['size'] > $upload_limit ) {
            $response = array_merge($response, [
                'data' => [
                    'message' => 'The file is too large or is not valid. Please select another file.'
                ],
            ]);
            return $response;
        }        

        // upload file and save to db
        $data = $input->all();
        $media = Media::upload($file,$data);

        if ( !is_null($media) ) {
            $response = array_merge($response, [
                'success' => true,
                'data' => $media->toArray(),                    
            ]);
        }

        $input->reset();
        echo json_encode($response);
        exit;

    }

    public function ajax ()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $data = $_POST;

        $response = [
            'success' => false,
            'data'  => null
        ];

        // DELETE 
        if ( $data['method'] == "DELETE" && isset($data['id']) )
        {
            $model = '\\models\\Media';
            $item = $model::find($_POST['id']);
            if ( $item ) {
                if ( $item->destroy() ) {
                    $response['success'] = true;
                    $response['data'] = [
                        'message' => 'The item was successfully deleted.'
                    ];
                } else {
                    $response['data'] = [
                        'message' => 'The item was not delted due to some error.'
                    ];
                }                    
            } else {
                $response['data'] = [
                    'message' => 'The item does not exist.'
                ];
            }          
        }

        // UPLOAD
        else if ( $data['method'] == "UPLOAD" )
        {
            global $input;
            $post_max = (integer) trim(ini_get('post_max_size'),'M');
            $upload_max =  (integer) trim(ini_get('upload_max_filesize'),'M');
            $upload_limit = $post_max < $upload_max ? $post_max : $upload_max;
            // size in MB
            $upload_limit *= 1048576;

            $response = [
                'success' => false,
                'data' => null
            ];

            $file = $_FILES['file'];

            // Check file size
            if ( $file['size'] > $upload_limit ) {
                $response = array_merge($response, [
                    'data' => [
                        'message' => 'The file is too large or is not valid. Please select another file.'
                    ],
                ]);
                return $response;
            }

            // upload file and save to db
            $media = Media::upload($file);

            if ( !is_null($media) ) {
                $response = array_merge($response, [
                    'success' => true,
                    'data' => $media->toArray(),                    
                ]);
            }

            echo json_encode($response);
            exit;
        }

        echo json_encode($response);
        exit;

    }
}
