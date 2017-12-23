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
        ),
        'login' => array(
                array(
                        'field' => 'username',
                        'label' => $this->lang->line('login_identity_label'),
                        'rules' => 'required|trim'
                ),
                array(
                        'field' => 'password',
                        'label' => $this->lang->line('login_password_label'),
                        'rules' => 'required|trim'
                ),
        ),
        'register' => array(
                array(
                        'field' => 'username',
                        'label' => $this->lang->line('login_identity_label'),
                        'rules' => 'required|trim'
                ),
                array(
                        'field' => 'password',
                        'label' => $this->lang->line('login_password_label'),
                        'rules' => 'required|trim'
                ),
                array(
                        'field' => 'email',
                        'label' => 'email',
                        'rules' => 'required|valid_email'
                ),
                array(
                        'field' => 'nama-depan',
                        'label' => 'nama depan',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'nama-belakang',
                        'label' => 'nama belakang',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'alamat',
                        'label' => 'alamat',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'phone',
                        'label' => 'phone',
                        'rules' => 'required'
                )
        )

);