<?php namespace App\Controllers;

use App\Models\ProductModel;

class Product extends BaseController {
    public function create() {
        return view('create_product');
    }

    public function store() {
        $productModel = new ProductModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'image' => $this->request->getPost('image'),
            'description' => $this->request->getPost('description')
        ];
        $productModel->save($data);
        return redirect()->to('/');
    }

    public function edit($id) {
        $productModel = new ProductModel();
        $data['product'] = $productModel->find($id);
        return view('edit_product', $data);
    }

    public function update($id) {
        $productModel = new ProductModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'image' => $this->request->getPost('image'),
            'description' => $this->request->getPost('description')
        ];
        $productModel->update($id, $data);
        return redirect()->to('/');
    }

    public function delete($id) {
        $productModel = new ProductModel();
        $productModel->delete($id);
        return redirect()->to('/');
    }
}