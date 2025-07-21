<?php
require_once __DIR__ . '/Controller.php';

class TestController extends Controller {
    public function show() {
        requireAuth();
        $this->renderView('');
    }
}