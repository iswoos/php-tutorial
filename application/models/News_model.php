<?php
class News_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    // slug의 기본값은 FALSE임
    public function get_news($slug = FALSE)
    {
        // FALSE이면 db에서 news테이블의 데이터를 가져온 뒤 return 함
        if ($slug === FALSE)
        {
            $query = $this->db->get('news');
            return $query->result_array();
        }

        // FALSE가 아니라면 news 테이블에서 slug값이 입력된 값과 동일한 것만 조건쿼리하여 가져온 뒤 return 함
        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
    }

    public function set_news()
    {
        $this->load->helper('url');

        // FROM 유효성 검사 통과 후 실행된 메서드이며, 통과 시 title값을 활용하여 url화 시킴 (띄어쓰기는 -로 바꾸고 모두 소문자로 치환)
        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        // 각 변수에 해당값 할당
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );

        // db의 news 테이블에 $data insert시킨 후, return
        if ($this->db->insert('news', $data)) {
            return $data;
        }
    }
}