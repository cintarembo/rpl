<?php
/**
 * Class Laporan File Doc Comment
 * PHP Version 5.5+
 *
 * @category Controller
 * @package  Controller_Package
 * @author   Agung Kurniawan <cintarembo@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://localhost/
 */
/**
 * Class Laporan Doc Comment
 *
 * @category Class
 * @package  Controller_Package
 * @author   Agung Kurniawan <cintarembo@gmail.com>
 * @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
 * @link     http://localhost/
 */
class Laporan extends MY_Controller
{
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Index
     * Halaman utama dari class Laporan
     *
     * @return void
     */
    public function index()
    {
        $this->load->model('laporan/laporan_m', 'lap');
        $this->data['laporan'] = $this->lap->with_member()->get_all();
        $this->render('laporan/index');
    }

    /**
     * Pembayaran
     * Mengkonfirmasi pembayaran secara manual pada halaman admin
     *
     * @return void
     */
    public function pembayaran()
    {
        $id_transaksi = $this->input->post('id_transaksi');
        $status = $this->input->post('status');
        $this->load->model('laporan/laporan_m', 'lap');
        $this->lap
            ->where('id_transaksi', $id_transaksi)
            ->update(
                array(
                    'status'=>$status
                )
            );
    }

    /**
     * Detail
     * Melihat detail pembayaran dari satu id transaksi
     *
     * @return void
     */
    public function detail($id)
    {
        $this->load->model('laporan/laporan_m', 'lap');
        $this->data['laporan_detail'] = $this->lap
            ->with_detail(
                array(
                'fields' => 'tanggal,jam,studio,jumlah_beli,harga',
                'with'   =>
                        array(
                            'relation'  => 'film' ,
                            'fields'    => 'judul,mulai_tayang,selesai_tayang,durasi'
                            )
                )
            )
            ->with_member(
                array(
                    'fields'    => 'username,first_name,last_name'

                )
            )
            ->with_konfirmasi(
                array(
                    'fields'    => 'nama,bank,bukti'
                )
            )
            ->where('id_transaksi', $id)
            ->get();
        $this->render('laporan/detail');
    }
}
