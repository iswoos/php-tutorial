<?php

class Pages extends CI_Controller
{
// $page 라는 하나의 독립변수를 가지는 뷰 함수와 함께, “pages” 라는 이름의 클래스를 생성
    public function view($page = 'home')
    {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

//      $data 배열에 "title" 키를 추가하고, 이 키에는 현재 페이지 이름의 첫 글자가 대문자로 변환된 값을 저장합니다.
        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
}
