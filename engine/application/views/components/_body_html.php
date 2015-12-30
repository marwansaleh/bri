<?php
$this->load->view('components/_body_header');

if (isset($subview)){
    $this->load->view($subview);
} 

/*
 * Filename: _body_html.php
 * Location: application/views/components/_body_html.php
 */