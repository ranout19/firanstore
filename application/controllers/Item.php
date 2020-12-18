<?php 
class Item extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        notLogin();
        $this->load->model(['item_m', 'unit_m', 'category_m']);
    }
    public function index()
    {
        $data['allitem'] = $this->item_m->getItem();
        $this->template->load('template', 'product/item/itemData', $data);
    }
    public function add()
    {
        $item = new stdClass();
        $item->item_id = null;
        $item->barcode = null;
        $item->name = null;
        $item->category_id = null;
        $item->unit_id = null;
        $item->price = null;
        $item->image = null;
        $item->gudang = null;
        $item->rak = null;
        $item->kolom = null;
        $item->detail = null;
        $category = $this->category_m->getCategory();
        $unit = $this->unit_m->getUnit();
        $data = [
            'page' => 'add',
            'row' => $item,
            'categorydata' => $category,
            'unitdata' => $unit
        ];
        $this->template->load('template', 'product/item/itemForm', $data);
    }
    public function edit($id)
    {
        $query = $this->item_m->getItem($id);
        if ($query->num_rows() > 0) {
            $item = $query->row();
            $category = $this->category_m->getCategory();
            $unit = $this->unit_m->getUnit();
            $data = [
                'page' => 'edit',
                'row' => $item,
                'categorydata' => $category,
                'unitdata' => $unit 
            ];
            $this->template->load('template', 'product/item/itemForm', $data);
        }else{
            $this->session->set_flashdata('warning', 'Data tidak ditemukan');
            redirect('item');
        }
    }
    public function process()
    {
        $post = $this->input->post(null,true);
        $config['upload_path']          = './uploads/product/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 20000;
        $config['file_name']            = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);
        $this->load->library('upload', $config);
        if (isset($post['add'])) {
            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {
                    $post['image'] = $this->upload->data('file_name');
                    $this->item_m->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'ditambahkan');
                    }
                    redirect('item');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('errorimg', $error);
                    redirect('item/add');
                }
                
            } else {
                $post['image'] = null;
                $this->item_m->add($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'ditambahkan');
                }
                redirect('item');
            }
            

        } else if (isset($post['edit'])) {
            if (@$_FILES['image']['name'] != null) {
                if ($this->upload->do_upload('image')) {

                    $item = $this->item_m->getItem($post['item_id'])->row();
                    if ($item->image != null) {
                        $replace = './uploads/product/'.$item->image;
                        unlink($replace);   
                    }

                    $post['image'] = $this->upload->data('file_name');
                    $this->item_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'diubah');
                    }
                    redirect('item');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('errorimg', $error);
                    redirect('item/edit'.$post['item_id']);
                }
                
            } else {
                $post['image'] = null;
                $this->item_m->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'diubah');
                }
                redirect('item');
            }

        }
    }
    public function del($id)
    {
        $item = $this->item_m->getItem($id)->row();
        $qrdel = './uploads/qrcode/item'.$item->item_id.'.png';
        unlink($qrdel);
        if ($item->image != null) {
            $replace = './uploads/product/'.$item->image;
            unlink($replace);   
        }
        $this->item_m->del($id);
        if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'dihapus');
        }
        redirect('item');
    }
    public function barcodeQrcode($id)
    {
        $data['row'] = $this->item_m->getItem($id)->row();
        $this->template->load('template', 'product/item/barcodeQrcode', $data);
    }
    public function printCode($id)
    {
        $data['row'] = $this->item_m->getItem($id)->row();
        $html = $this->load->view('product/item/printcode', $data, true);
        $this->pdf->print($html, $data['row']->name, 'A4', 'landscape');
    }
}