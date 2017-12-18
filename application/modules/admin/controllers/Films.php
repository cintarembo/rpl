<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Films extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model(array(
            'films/Films_model'=>'film',
            'films/Genre_model'=>'genre',
            'films/Genrefilm_model' =>'gfm'
            ));
        $this->load->library(array(
            'form_validation' => 'validation'
        ));
        $this->validation->CI =& $this;
    }

    public function index(){
        $this->data['film'] = $this->film->get_all();
        $this->render('films/films');
    }

    public function addFilms(){
        if ($this->input->post()):
            if ($this->validation->run('addFilms')==TRUE):
                $judul  = $this->input->post('judul');
                $tgl    = $this->input->post('tanggal-tayang');            
                $jam    = $this->input->post('jam-tayang');
                $durasi = $this->input->post('durasi-film');
                $harga  = $this->input->post('harga-tiket');
                $sinopsis  = $this->input->post('sinopsis');
                $genre  = $this->input->post('genrefilm');
                
                $config['upload_path']          = './public/uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['encrypt_name']         = TRUE;
                $config['max_size']             = 10000;
                $config['max_width']            = 4328;
                $config['max_height']           = 4328;
                $this->load->library('upload', $config);
                $this->upload->do_upload('coverfilm');
                print_r($this->upload->display_errors());
                $data = array(
                    'judul'          => $judul,
                    'sinopsis'       => $sinopsis,
                    'tanggal_tayang' => $tgl,
                    'jam_tayang'     => $jam,
                    'durasi'         => $durasi,
                    'harga'          => $harga,
                    'cover'          => $this->upload->data('file_name')
                    );
                    
                $this->film->insert($data);
                $this->db->insert('tbl_genrefilm',array(
                                    'id_film' => $this->db->insert_id(),
                                    'id_genre'=> $genre));
                
                $status = array(
                    'status'  => true,
                    'message' => 'Berhasil menambahkan film baru'
                );
                echo json_encode($status);
            else:
                $err = $this->validation->error_array();
                show_error(500);
            endif; //.Form Validation*/
        else:
            $this->data['genre'] = $this->genre->get_all();
            $this->render('films/addFilms');
        endif; //.this->input->post()
    }

    public function editFilms($id = NULL){
        if ($this->input->post()):
            if ($this->validation->run('addFilms')==TRUE):
                $judul  = $this->input->post('judul');
                $tgl    = $this->input->post('tanggal-tayang');            
                $jam    = $this->input->post('jam-tayang');
                $durasi = $this->input->post('durasi-film');
                $harga  = $this->input->post('harga-tiket');
                $sinopsis  = $this->input->post('sinopsis');
                
                $data = array(
                    'judul'          => $judul,
                    'sinopsis'       => $sinopsis,
                    'tanggal_tayang' => $tgl,
                    'jam_tayang'     => $jam,
                    'durasi'         => $durasi,
                    'harga'          => $harga
                    );

                $config['upload_path']          = './public/uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['encrypt_name']         = TRUE;
                $config['max_size']             = 100;
                $config['max_width']            = 4328;
                $config['max_height']           = 4328;
                $this->load->library('upload', $config);
                $this->upload->do_upload('coverFilm');

                $data = array(
                    'judul'          => $judul,
                    'sinopsis'       => $sinopsis,
                    'tanggal_tayang' => $tgl,
                    'jam_tayang'     => $jam,
                    'durasi'         => $durasi,
                    'harga'          => $harga,
                    'cover'          => $this->upload->data('file_name')
                    );
                
                $this->film->update($data,$id);
                $status = array(
                    'status'  => true,
                    'message' => 'Berhasil menambahkan film baru'
                );
                echo json_encode($status);
            else:
                show_error(500);
            endif; //.Form Validation
        else:
//            $this->data['film'] = $this->film->get($id);
            $this->data['data'] = $this->gfm->with_film()->with_genre()->get($id);
            $this->data['genre'] = $this->genre->get_all();
            $this->render('films/editFilms');
        endif; //.this->input->post()
    }

    public function delFilms(){
        $id = $this->input->post('id');
        $data = $this->film->get($id);
        if(file_exists($image = FCPATH.'public/uploads/'.$data->cover)):
            unlink($image);
        endif;
        $this->film->delete($id);
    }


    /**
     * Function untuk genre dalam film
     */
    public function genre(){
        $this->data['genre'] = $this->genre->get_all();
        $this->render('films/genre');
    }

    public function addgenre(){
        if ($this->input->post()):
            $nama = $this->input->post('nama');
            $this->genre->insert(array('genre'=>$nama));
        else:
            show_404();
        endif;
    }

    public function editgenre(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $this->genre->update(array('genre'=>$nama),$id);
    }

    public function delgenre(){
        $id = $this->input->post('id');
        $this->genre->delete($id);
    }
}
