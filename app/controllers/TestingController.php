<?php
require_once __DIR__ . '/Controller.php';

class TestingController extends Controller {
    public function show() {
        requireAuth();
        $this->renderView('');
    }
}