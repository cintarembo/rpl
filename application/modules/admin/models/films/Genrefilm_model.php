<?php

class Genrefilm_model extends MY_Model
{
    public $table='tbl_genrefilm';
    public $primary_key = 'id_film';
    public $protected = array('id_genre','id_film');
    public $timestamps = FALSE;
    public $soft_deletes = FALSE;

    public function __construct(){
        $this->has_one['film'] = array('foreign_model'=>'films_model','foreign_table'=>'tbl_film','foreign_key'=>'id_film','local_key'=>'id_film');
        $this->has_many['genre'] = array('foreign_model'=>'genre_model','foreign_table'=>'tbl_genre','foreign_key'=>'id_genre','local_key'=>'id_genre');
        parent::__construct();
        $this->load->database();
    }

}
