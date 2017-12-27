<?php


class Films_model extends MY_Model
{
    public $table = 'tbl_film';
    public $primary_key = 'id_film';
    public $protected = array('id_film');
    public $soft_deletes = false;
    public $timestamps = false;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function update_genre($id, $genre)
    {
        if ($this->checks('tbl_genrefilm') == true) {
            $this->db->where('id_film', $id);
            $this->db->delete('tbl_genrefilm');
            for ($i = 0; $i < count($genre); ++$i) {
                $this->db->insert('tbl_genrefilm', ['id_film' => $id, 'id_genre' => $genre[$i]]);
            }
        } else {
            for ($i = 0; $i < count($genre); ++$i) {
                $this->db->insert('tbl_genrefilm', ['id_film' => $id, 'id_genre' => $genre[$i]]);
            }
        }
    }

    public function update_studio($id, $studio)
    {
        if ($this->checks('film_studio') == true) {
            $this->db->where('id_film', $id);
            $this->db->delete('film_studio');
            for ($i = 0; $i < count($studio); ++$i) {
                $this->db->insert('film_studio', ['id_film' => $id, 'id_studio' => $studio[$i]]);
            }
        } else {
            for ($i = 0; $i < count($studio); ++$i) {
                $this->db->insert('film_studio', ['id_film' => $id, 'id_studio' => $studio[$i]]);
            }
        }
    }

    public function update_jam($id, $jam)
    {
        if ($this->checks('jam_tayang') == true) {
            $this->db->where('id_film', $id);
            $this->db->delete('jam_tayang');
            for ($i = 0; $i < count($jam); ++$i) {
                $this->db->insert('jam_tayang', ['id_film' => $id, 'id_jam' => $jam[$i]]);
            }
        } else {
            for ($i = 0; $i < count($jam); ++$i) {
                $this->db->insert('jam_tayang', ['id_film' => $id, 'id_jam' => $jam[$i]]);
            }
        }
    }

    private function checks($ta)
    {
        $this->db->from($ta);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
