<?php

namespace App\Controllers;

use App\Models\FeedbackModel;

class AdminFeedback extends BaseController
{
    public function index()
    {
        $model = new FeedbackModel();
        
        // Mengambil data dari tbl_feedback
        $data['feedback'] = $model->orderBy('tanggal', 'DESC')->findAll();

        // Pastikan nama file (header, top_menu, dll) sesuai dengan yang ada di folder part_adm kamu
        echo view('part_adm/header');
        echo view('part_adm/top_menu');
        echo view('part_adm/side_menu');
        echo view('feedback_list', $data); // Karena tadi kamu minta disatukan di folder Views
        echo view('part_adm/footer');
    }

    public function delete($id)
    {
        $model = new FeedbackModel();
        $model->delete($id);
        
        return redirect()->to(base_url('admin/feedback'))->with('status', 'Pesan berhasil dihapus');
    }
}