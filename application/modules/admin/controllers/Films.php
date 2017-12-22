<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Films extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model(array(
            'films/Films_model'=>'film',
            'films/Genre_model'=>'genre',
            'films/Genrefilm_model' =>'gfm',
            'films/Studio_model'=> 'studio'
            ));
        $this->load->library(array(
            'form_validation' => 'validation',
            'image_nation'    => 'image'
        ));
        $this->validation->CI =& $this;
    }

    /**
     * index
     *
     * @return void
     */
    public function index(){
        $this->data['film'] = $this->film->get_all();
        $this->render('films/films');
    }

    /**
     * addFilms
     *
     * @return void
     */
    public function addFilms(){
        if ($this->input->post()):
            if ($this->validation->run('addFilms')==TRUE):
                $judul     = $this->input->post('judul');
                $tgl       = $this->input->post('tanggal-tayang');            
                $jam       = $this->input->post('jam-tayang');
                $durasi    = $this->input->post('durasi-film');
                $harga     = $this->input->post('harga-tiket');
                $sinopsis  = $this->input->post('sinopsis');
                $genre     = $this->input->post('genrefilm');
                $hall      = $this->input->post('studio');
                $featured  = $this->input->post('featured');
                $status    = $this->input->post('status');
                
                $config['upload_path']          = './public/uploads/original';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['encrypt_name']         = TRUE;
                $config['max_size']             = 10000;
                $config['max_width']            = 4328;
                $config['max_height']           = 4328;
                $this->load->library('upload', $config);
                $this->upload->do_upload('coverfilm');
                
                /** Resize images */
                $this->image->source($this->upload->data('file_name'));
                $this->image->process('255x220|380x600|424x424');

                $data = array(
                    'judul'          => $judul,
                    'sinopsis'       => $sinopsis,
                    'tanggal_tayang' => $tgl,
                    'jam_tayang'     => $jam,
                    'durasi'         => $this->number($durasi),
                    'harga'          => $this->number($harga),
                    'cover'          => $this->upload->data('file_name'),
                    'id_hall'        => $hall,
                    'featured'       => $feat = (!empty($featured)) ? '1' : '',
                    'status'         => $sts  = (!empty($status)) ? '1' : '0'
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
                show_error($err);
            endif; //.Form Validation*/
        else:
            $this->data['genre'] = $this->genre->get_all();
            $this->data['studio']= $this->studio->get_all();
            $this->render('films/addFilms');
        endif; //.this->input->post()
    }

    /**
     * editFilms
     * Digunakan untuk edit/update pada film
     * @param mixed $id
     * @return void
     */
    public function editFilms($id = NULL){
        if ($this->input->post()):
            if ($this->validation->run('addFilms')==TRUE):
                $judul  = $this->input->post('judul');
                $tgl    = $this->input->post('tanggal-tayang');            
                $jam    = $this->input->post('jam-tayang');
                $durasi = $this->input->post('durasi-film');
                $harga  = $this->input->post('harga-tiket');
                $sinopsis  = $this->input->post('sinopsis');
                $hall      = $this->input->post('studio');
                $featured  = $this->input->post('featured');
                $status    = $this->input->post('status');

                $config['upload_path']          = './public/uploads/original';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['encrypt_name']         = TRUE;
                $config['max_size']             = 100;
                $config['max_width']            = 4328;
                $config['max_height']           = 4328;
                $this->load->library('upload', $config);
                $this->upload->do_upload('coverFilm');

                /** Resize images */
                $this->image->source($this->upload->data('file_name'));
                $this->image->process('255x220|380x600|424x424');

                $data = array(
                    'judul'          => $judul,
                    'sinopsis'       => $sinopsis,
                    'tanggal_tayang' => $tgl,
                    'jam_tayang'     => $jam,
                    'durasi'         => $this->number($durasi),
                    'harga'          => $this->number($harga),
                    'cover'          => $this->upload->data('file_name'),
                    'id_hall'        => $hall,
                    'featured'       => $feat = (!empty($featured)) ? '1' : '',
                    'status'         => $sts  = (!empty($status)) ? '1' : '0'
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
            $this->data['data'] = $this->gfm->with_film()->with_genre()->get($id);
            $this->data['genre'] = $this->genre->get_all();
            $this->data['studio']= $this->studio->get_all();
            $this->render('films/editFilms');
        endif; //.this->input->post()
    }

    /**
     * delFilms
     * Delete film and images
     * @return void
     */
    public function delFilms(){
        $id = $this->input->post('id');
        $data = $this->film->get($id);
        if(file_exists($image = FCPATH.'public/uploads/original/'.$data->cover)):
            $size = $this->config->item('default_sizes', 'image_nation');
            $a = explode('|',$size);
            foreach ($a as $b) {
                if(file_exists($img = FCPATH.'public/uploads/'.$b.'/'.$data->cover)){
                    unlink($img);
                }
            }
            unlink($image);
        endif;
        $this->film->delete($id);
    }

    
    /**
     * Genre
     *
     * @return void
     */
    public function genre(){
        $this->data['genre'] = $this->genre->get_all();
        $this->render('films/genre');
    }

    /**
     * addgenre
     * menambahkan genre baru
     * @return void
     */
    public function addgenre(){
        if ($this->input->post()):
            $nama = $this->input->post('nama');
            $this->genre->insert(array('genre'=>$nama));
        else:
            show_404();
        endif;
    }

    /**
     * editgenre
     * digunakan untuk melakukan update/edit pada genre
     * @return void
     */
    public function editgenre(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $this->genre->update(array('genre'=>$nama),$id);
    }

    /**
     * delgenre
     * digunakan untuk menghapus genre
     * @return void
     */
    public function delgenre(){
        $id = $this->input->post('id');
        $this->genre->delete($id);
    }
}
