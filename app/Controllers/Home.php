public function comment($productId) {
    $commentModel = new CommentModel();
    $comment = $this->request->getPost('comment');

    // Sanitize and validate input
    $comment = filter_var($comment, FILTER_SANITIZE_STRING);

    if (!empty($comment)) {
        $commentModel->save(['user_id' => session()->get('user_id'), 'product_id' => $productId, 'comment' => $comment]);
    }

    return redirect()->to('/');
}