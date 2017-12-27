<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Films extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->ion_auth->logged_in()) {
            if (!$this->ion_auth->is_admin()) {
                redirect('pub/home');
            }
        } else {
            redirect('pub/home');
        }

        $this->load->model(array(
            'films/Films_model' => 'film',
            'films/Genre_model' => 'genre',
            'films/Genrefilm_model' => 'gfm',
            'films/Studio_model' => 'studio',
            'films/Jam_model' => 'jam',
            'films/Film_studio_model' => 'fsm',
            'films/jam_tayang_model' => 'jtm',
            ));
        $this->load->library(array(
            'form_validation' => 'validation',
            'image_nation' => 'image',
        ));
        $this->load->helper('slug_helper', 'slug');
        $this->validation->CI = &$this;
    }

    /**
     * index.
     */
    public function index()
    {
        $this->data['film'] = $this->film->get_all();
        $this->render('films/films');
    }

    /**
     * addFilms.
     */
    public function addFilms()
    {
        if ($this->input->post()) {
            if ($this->validation->run('addFilms') == true) {
                $judul = $this->input->post('judul');
                $sinopsis = $this->input->post('sinopsis');
                $mulai_tayang = $this->input->post('mulai-tayang');
                $selesai_tayang = $this->input->post('selesai-tayang');
                $jam = $this->input->post('jam');
                $durasi = $this->input->post('durasi-film');
                $genre = $this->input->post('genrefilm');
                $studio = $this->input->post('studio');
                $featured = $this->input->post('featured');
                $status = $this->input->post('status');

                $config['upload_path'] = './public/uploads/original';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['encrypt_name'] = true;
                $config['max_size'] = 10000;
                $config['max_width'] = 4328;
                $config['max_height'] = 4328;
                $this->load->library('upload', $config);
                $this->upload->do_upload('coverfilm');

                /* Resize images */
                if ($this->upload->do_upload('coverfilm')) {
                    $this->image->source($this->upload->data('file_name'));
                    $this->image->process('255x220|380x600|424x424|526x773|400x420');
                }

                $data = [
                    'judul' => $judul,
                    'sinopsis' => $sinopsis,
                    'mulai_tayang' => $mulai_tayang,
                    'selesai_tayang' => $selesai_tayang,
                    'durasi' => $this->number($durasi),
                    'cover' => $this->upload->data('file_name'),
                    'featured' => $feat = (!empty($featured)) ? '1' : '',
                    'status' => $sts = (!empty($status)) ? '1' : '0',
                    'slug' => slug($judul),
                ];

                $this->film->insert($data);
                $film = $this->film->get($this->db->insert_id());
                $id = $film->id_film;
                for ($i = 0; $i < count($genre); ++$i) {
                    $this->db->insert('tbl_genrefilm', ['id_film' => $id, 'id_genre' => $genre[$i]]);
                }
                for ($i = 0; $i < count($studio); ++$i) {
                    $this->db->insert('film_studio', ['id_film' => $id, 'id_studio' => $studio[$i]]);
                }
                for ($i = 0; $i < count($jam); ++$i) {
                    $id_jam = $this->jam->where('jam', $jam[$i])->get()->id;
                    $this->db->insert('jam_tayang', ['id_film' => $id, 'id_jam' => $id_jam]);
                }
                $status = [
                    'status' => true,
                    'msg' => 'Berhasil menambahkan film baru',
                ];
                echo json_encode($status);
            } else {
                $status = ['status' => false, 'msg' => 'Terjadi kesalahan, silahkan coba lagi'];
                echo json_encode($status);
            } //.Form Validation*/
        } else {
            $this->data['genre'] = $this->genre->get_all();
            $this->data['studio'] = $this->studio->get_all();
            $this->render('films/addFilms');
        } //.this->input->post()
    }

    /**
     * editFilms
     * Digunakan untuk edit/update pada film.
     *
     * @param mixed $id
     */
    public function editFilms($id = null)
    {
        if ($this->input->post()) {
            if ($this->validation->run('addFilms') == true) {
                $id = $this->input->post('id');
                $judul = $this->input->post('judul');
                $sinopsis = $this->input->post('sinopsis');
                $mulai_tayang = $this->input->post('mulai-tayang');
                $selesai_tayang = $this->input->post('selesai-tayang');
                $jam = $this->input->post('jam');
                $durasi = $this->input->post('durasi-film');
                $genre = $this->input->post('genrefilm');
                $studio = $this->input->post('studio');
                $featured = $this->input->post('featured');
                $status = $this->input->post('status');

                $config['upload_path'] = './public/uploads/original';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['encrypt_name'] = true;
                $config['max_size'] = 10000;
                $config['max_width'] = 4328;
                $config['max_height'] = 4328;
                $this->load->library('upload', $config);
                $this->upload->do_upload('coverfilm');

                /* Resize images */
                if ($this->upload->do_upload('coverfilm')) {
                    $this->image->delete($id);
                    $this->image->source($this->upload->data('file_name'));
                    $this->image->process('255x220|380x600|424x424|526x773|400x420');
                    $data = [
                        'judul' => $judul,
                        'sinopsis' => $sinopsis,
                        'mulai_tayang' => $mulai_tayang,
                        'selesai_tayang' => $selesai_tayang,
                        'durasi' => $this->number($durasi),
                        'cover' => $this->upload->data('file_name'),
                        'featured' => $feat = (!empty($featured)) ? '1' : '',
                        'status' => $sts = (!empty($status)) ? '1' : '0',
                        'slug' => slug($judul),
                    ];
                } else {
                    $data = [
                        'judul' => $judul,
                        'sinopsis' => $sinopsis,
                        'mulai_tayang' => $mulai_tayang,
                        'selesai_tayang' => $selesai_tayang,
                        'durasi' => $this->number($durasi),
                        'featured' => $feat = (!empty($featured)) ? '1' : '',
                        'status' => $sts = (!empty($status)) ? '1' : '0',
                        'slug' => slug($judul),
                    ];
                }

                $this->film->update($data, $id);
                $this->film->update_genre($id, $genre);
                $this->film->update_studio($id, $studio);
                $this->film->update_jam($id, $jam);

                $status = [
                    'status' => true,
                    'msg' => 'Berhasil melakukan pembaharuan film',
                ];
                echo json_encode($status);
            } else {
                echo json_encode($this->validation->error_array());
            } //.Form Validation*/
        } else {
            $this->data['data'] = $this->gfm->with_film()->get($id);
            $this->data['genre'] = $this->genre->get_all();
            $this->data['studio'] = $this->studio->get_all();
            $this->data['jam'] = $this->jam->get_all();
            $this->data['data_studio'] = $this->fsm->where('id_film', $id)->with_studio()->get_all();
            $this->data['data_jam'] = $this->jtm->where('id_film', $id)->with_jam()->get_all();
            $this->render('films/editFilms');
        } //.this->input->post()
    }

    /**
     * delFilms
     * Delete film and images.
     */
    public function delFilms()
    {
        $id = $this->input->post('id');
        $data = $this->film->get($id);
        if (file_exists($image = FCPATH.'public/uploads/original/'.$data->cover)) {
            $size = $this->config->item('default_sizes', 'image_nation');
            $a = explode('|', $size);
            foreach ($a as $b) {
                if (file_exists($img = FCPATH.'public/uploads/'.$b.'/'.$data->cover)) {
                    unlink($img);
                }
            }
            unlink($image);
        }
        $this->film->delete($id);
    }

    /**
     * Genre.
     */
    public function genre()
    {
        $this->data['genre'] = $this->genre->get_all();
        $this->render('films/genre');
    }

    /**
     * addgenre
     * menambahkan genre baru.
     */
    public function addgenre()
    {
        if ($this->input->post()) {
            $nama = $this->input->post('nama');
            $this->genre->insert(array('genre' => $nama));
        } else {
            show_404();
        }
    }

    /**
     * editgenre
     * digunakan untuk melakukan update/edit pada genre.
     */
    public function editgenre()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $this->genre->update(array('genre' => $nama), $id);
    }

    /**
     * delgenre
     * digunakan untuk menghapus genre.
     */
    public function delgenre()
    {
        $id = $this->input->post('id');
        $this->genre->delete($id);
    }
}
