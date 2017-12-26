<?php
 if (!defined('BASEPATH')) {
     exit('No direct script access allowed');
 }

$config = [
        'addFilms' => [
                [
                        'field' => 'judul',
                        'label' => 'judul film',
                        'rules' => 'required|trim',
                ],
                [
                        'field' => 'tanggal-tayang',
                        'label' => 'tanggal tayang',
                        'rules' => 'required|trim',
                ],
                [
                        'field' => 'jam-tayang',
                        'label' => 'jam tayang',
                        'rules' => 'required|trim',
                ],
                [
                        'field' => 'durasi-film',
                        'label' => 'durasi film',
                        'rules' => 'required|trim',
                ],
                [
                        'field' => 'harga-tiket',
                        'label' => 'harga tiket',
                        'rules' => 'required|trim',
                ],
        ],
        'login' => [
                [
                        'field' => 'username',
                        'label' => $this->lang->line('login_identity_label'),
                        'rules' => 'required|trim',
                ],
                [
                        'field' => 'password',
                        'label' => $this->lang->line('login_password_label'),
                        'rules' => 'required|trim',
                ],
        ],
        'register' => [
                [
                        'field' => 'username',
                        'label' => $this->lang->line('login_identity_label'),
                        'rules' => 'required|trim',
                ],
                [
                        'field' => 'password',
                        'label' => $this->lang->line('login_password_label'),
                        'rules' => 'required|trim',
                ],
                [
                        'field' => 'email',
                        'label' => 'email',
                        'rules' => 'required|valid_email',
                ],
                [
                        'field' => 'nama-depan',
                        'label' => 'nama depan',
                        'rules' => 'required',
                ],
                [
                        'field' => 'nama-belakang',
                        'label' => 'nama belakang',
                        'rules' => 'required',
                ],
                [
                        'field' => 'alamat',
                        'label' => 'alamat',
                        'rules' => 'required',
                ],
                [
                        'field' => 'phone',
                        'label' => 'phone',
                        'rules' => 'required',
                ],
        ],

];
