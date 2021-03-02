<?php

use GuzzleHttp\Psr7\Response;

defined('BASEPATH') or exit('No direct script access allowed');

class Balita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Balita_model', 'balita');
        $this->load->model('Admin_model', 'admin');
    }

    public function addBalita()
    {
        $this->balita->addBalita();
        // $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('admin/balita');
    }
    public function load_balita()
    {
        $id_user = $_GET['filter'];
        if ($id_user == 0) {
            $balita = $this->admin->getBalita();
        } else {
            $balita = $this->balita->getBalitaByUser($id_user);
        }

        if (!empty($balita)) {
            $i = 1; ?>
            <?php foreach ($balita as $b) { ?>
                <tr>
                    <th><?php echo $i++; ?></th>
                    <td><?php echo $b['nama_balita']; ?></td>
                    <td><?php echo $b['nama_orangtua']; ?></td>
                    <td><?php echo "RT: " . $b['rt_balita'] . " RW: " . $b['rw_balita'] . " Dusun: "  . $b['alamat_balita']; ?></td>
                    <td><?php echo $b['tgllahir_balita']; ?></td>
                    <td><?php if ($b['kelamin_balita'] == 'L') {
                            echo 'Laki-Laki';
                        } else {
                            echo 'Perempuan';
                        } ?></td>
                    <td>
                        <a data-toggle="modal" data-target="#modalEdit<?php echo $b['id_balita']; ?>"><button class="badge badge-info"> Ubah</button></a> | <a class="badge badge-danger" href="<?php echo base_url('balita/deleteBalita?id_balita=' . $b['id_balita'] . ''); ?>" role="button">Hapus</a>
                    </td>
                </tr>
            <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="7" align="center">Tidak ada data</td>
            <tr>
    <?php

        }
    }
    public function addPerkembangan()
    {
        $this->balita->addPerkembangan();
        redirect('admin/perkembangan');
    }
    public function editBalita()
    {
        $this->balita->editBalita();
        // $this->session->set_flashdata('flash', 'Ditambahkan');
        redirect('admin/balita');
    }
    public function deleteBalita()
    {
        $id_balita = $_GET['id_balita'];
        $this->balita->deleteBalita($id_balita);
        redirect('admin/balita');
    }
    public function deleteStimulasi()
    {
        $id_stimulasi = $_GET['id_stimulasi'];
        $this->balita->deleteStimulasi($id_stimulasi);
        redirect('admin/t_stimulasi');
    }
    public function deletePerkembangan()
    {
        $id_perkembangan = $_GET['id_perkembangan'];
        $this->balita->deletePerkembangan($id_perkembangan);
        redirect('admin/perkembangan');
    }

    public function addBbu()
    {
        $this->balita->addBbu();
        redirect('admin/bbu');
    }
    public function addTbu()
    {
        $this->balita->addTbu();
        redirect('admin/tbu');
    }
    public function addBbtb()
    {
        $this->balita->addBbtb();
        redirect('admin/bbtb');
    }

    public function searchBalitaBBU()
    {
        $id_balita = $this->input->post('id_balita');
        $search = $this->balita->getIDBalita($id_balita);
        foreach ($search->result() as $data) {
            $hasil = array(
                'id_balita' => $data->id_balita,
                'tgllahir_balita' => $data->tgllahir_balita,
                'kelamin_balita' => $data->kelamin_balita
            );
        }
        echo json_encode($hasil);
    }
}
