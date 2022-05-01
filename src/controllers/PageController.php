<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;

class PageController extends Controller {

    public function About() {
       $this->render('page_about');
    }

    public function News() {
        $this->render('page_news');
    }

    public function Privacy() {
        $this->render('page_privacy');
    }

    public function Terms() {
        $this->render('page_terms');
    }

    public function Contact() {
        $this->render('page_contact');
    }
}