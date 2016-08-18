<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Template_model extends CI_Model {


    private $table_name = 'template';

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();

    }

    public function list_template() {
    	$this->db->select('*');
		$this->db->from($this->table_name);
		$query = $this->db->get();
		return $query->result_array();
    }

    public function create_template($data){
        if (isset($data['id']))
        {
            $this->db->where('id', $data['id']);
            $this->db->update($this->table_name, $data);
            return $data['id'];
        }
        else {
            $this->db->insert($this->table_name, $data);
            return ($this->db->affected_rows()==1) ? $this->db->insert_id() : FALSE;
        }
    }

    public function get_template_by_id($template_id){
        $this->db->where('id', $template_id);
        $template =  $this->db->get($this->table_name)->row_array();
        return $template;
    }

    public function update_file($data){
        $this->db->where('id', $data['id']);
        $this->db->update($this->table_name, $data);
        return $data['id'];
    }

    public function delete_template($template_id){
        $this->db->where('id', $template_id);
        $this->db->delete("template");
        return 1;
    }

    public function find_templates_by_word_picture($word_count, $pictures_count, $article) {
        $contain_sponsorship_ad = $article['sponsorship_ad_id']?1:0;
        $article_type_text = strtolower($article['article_type_text']);
        $is_cover_template = 0;
        if ($article_type_text=='cover') {
            $is_cover_template = 1;
        }
        if (!$contain_sponsorship_ad) $contain_sponsorship_ad = 0;
        if (!$word_count and !$pictures_count) {
            return array();
        }

        $article_type_name = $article['article_type_text'];
        if ($article_type_name=='Page 3 Intro') {
            $sql = 'SELECT * FROM template where page_3_intro=1';
        } else if ($article_type_name=='Sponsor Index' or $article_type_name=='Real Estate Resource' or $article_type_name=='Resident Business Guide') {
            $sql = 'SELECT * FROM template where is_special=1';
        } else {
            $sql = 'SELECT * FROM template where min_word_count<=%s and max_word_count>=%s and max_pictures=%s and contain_sponsorship_ad=%s ';
            $sql = sprintf($sql, $word_count, $word_count, $pictures_count, $contain_sponsorship_ad);
            if ($is_cover_template) {
                $sql .= ' and is_cover_template=1';
            }

            if (trim($article['call_to_action'])) {
                $sql .= ' and call_to_action=1';
            }

            $sql2 = 'SELECT * FROM article_asset where article_id=\'%s\' and caption<>\'\' and NOT caption is NULL ';
            $sql2 = sprintf($sql2, $article['article_id']);
            $result = $this->db->query($sql2)->result_array();
            if (count($result)) {
                $sql .= ' and with_caption=1';
            }
        }
        log_message('error', 'article'.$article['article_id'].'---'.$sql);
        //echo $sql;
        return $this->db->query($sql)->result_array();
    }

    public function get_back_cover_template() {
        $this->db->where('is_back_cover_template', 1);
        return $this->db->get($this->table_name)->row_array();
    }
}
