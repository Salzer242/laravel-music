<?php

Class SongController extends BaseController 
{

    public function index()
    {
        $songs = SongRestful::index();
        //return var_dump($songs);
        return View::make('songs', array('songs'=>$songs));
    }

    public function show($id)
    {
        $data = SongRestful::show($id);
        return View::make('song', array('song'=>$data));
    }


    public function search()
    {
        $query = Input::get('search');
        $songs = Song::where('songname','LIKE','%'.$query.'%')->get();
        if(Request::ajax())
        {
           //return Response::json(View::make('posts', array('posts' => $posts))->render());
            //return $songs;
            //return 
            //return Response::make(View::make('ajax_suggestsong.blade.php',array('songs'=>$songs))->render());
            return $this->toJson(View::make('ajax_suggestsong',array('songs'=>$songs)));
        }
        else
        {
            Input::flash();
            //return var_dump($songs);
            return View::make('search', array('songs'=>$songs));
        }

        
    }


    public function showUpload()
    {
        return View::make('upload');
    }


    /*
    Khanh
    Upload song
    ? lam sao validate biet duoc la file mp3?? 
    khong lay gio phut giay chi? lay giay

    */

     public function doUpload()
    { 
        //return var_dump(Input::all());
        $file = array('image' => Input::file('image'));
        
        

        $rules = array(
            'image' =>'required|max:100000',
            'songname' =>'required',
            'artist'=>'required',
            'genres'=>'required',
            'album'=>'required'
            ); 
        
        
    
        $validator = Validator::make(Input::all(), $rules);
            
        

        if ($validator->fails() ) 
        {
            
            Session::flash('error', 'Validate Failed: '.$validator); 
            return Redirect::to('upload')->withErrors($validator)->withInput(Input::all());

        } else {

            $mime = Input::file('image')->getMimeType();                                       // Lấy mime type 

            if ($mime =='audio/mpeg') {                                                        // So sánh với .mp3
                
            
                $destinationPath = 'uploads';                                                      // Lưu vào public/uploads
             
                    
                $name = Input::file('image')->getClientOriginalName();                             // Lấy tên File
                //$extension = Input::file('image')->getClientOriginalExtension();
                $filename = $name; 
                $upload_success = Input::file('image')->move($destinationPath, $filename);         // Upload vào folder uploads trong server
                
                $path = $destinationPath.'/'.$filename ;                                           // Lưu đường dẫn của 1 song vào CSDL
                //$uploaddate = Carbon::now();                                                       // Lấy time hiện tại 
                
                $mp3file = new MP3File($path);                                                     // Khai báo tính thời gian 1 file .mp3
                $duration1 = $mp3file->getDurationEstimate();                                      // Lấy theo tổng số giây (s)
                // Lấy theo format giờ:phút:giây 1 file .mp3
               // $duration2 = $mp3file->getDuration();
               // $duration = MP3File::formatTime($duration2);

                if( $upload_success ) {

                    SongRestful::store($path,$duration1);                               // Lưu thông tin 1 song vào CSDL
                    Session::flash('success', 'Upload successfully!!!');                               // Thông báo thành công
                    return Redirect::to('upload');
               
                } else {
                    Session::flash('error', 'Store Failed!!');
                    return Redirect::to('upload');
                }
            } else {
                Session::flash('error', 'Mime Failed: '.$mime);                                           // Nếu không phải file .mp3 thì bật Alert thông báo
                return Redirect::to('upload');
            }

        }
    }
}

    