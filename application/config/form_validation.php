<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
        'addFilms' => array(
                array(
                        'field' => 'judul',
                        'label' => 'judul film',
                        'rules' => 'required|trim'
                ),
                array(
                        'field' => 'tanggal-tayang',
                        'label' => 'tanggal tayang',
                        'rules' => 'required|trim'
                ),
                array(
                        'field' => 'jam-tayang',
                        'label' => 'jam tayang',
                        'rules' => 'required|trim'
                ),
                array(
                        'field' => 'durasi-film',
                        'label' => 'durasi film',
                        'rules' => 'required|trim'
                ),
                array(
                        'field' => 'harga-tiket',
                        'label' => 'harga tiket',
                        'rules' => 'required|trim'
                )
        )
);