<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('getBulan')){
  function getBulan($bulan){
    $bulan = (int) $bulan;
    $months = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    return ($months[$bulan-1]);
  }
}

if ( ! function_exists('set_date')){
  function set_date($datetime){
    $date = date_create($datetime);
    
    $year = date_format($date,"Y");
    $month = (int) date_format($date,"m");
    $days = date_format($date,"d");
    $day = date_format($date,"w");
    $hour = date_format($date,"H");
    $minutes = date_format($date,"i");

    if ($year < 1000) {
      $year += 1900;
    }

    $dayarray = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
    $montharray = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    return $dayarray[$day].",  ".$days." ".$montharray[$month-1]." ".$year;
    // return $dayarray[$day].",  ".$days." ".$montharray[$month-1]." ".$year;
  }
}

if ( ! function_exists('set_datetime')){
  function set_datetime($datetime){
    $date = date_create($datetime);
    
    $year = date_format($date,"Y");
    $month = (int) date_format($date,"m");
    $days = date_format($date,"d");
    $day = date_format($date,"w");
    $hour = date_format($date,"H");
    $minutes = date_format($date,"i");

    if ($year < 1000) {
      $year += 1900;
    }

    $dayarray = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
    $montharray = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    return $dayarray[$day].",  ".$days." ".$montharray[$month-1]." ".$year." at ".$hour.":".$minutes;
  }
}

if( ! function_exists('encode') ){
  function encode($data){
    $encode = base64_encode($data);
    return base64_encode($encode."|".$data."|".$encode);
  }
}

if( ! function_exists('decode') ){
  function decode($data){
    $decode = base64_decode($data);
    $data = explode("|",$decode);
    return $data[1];
  }
}

if( ! function_exists('get_menu') ){
  function get_menu($parent){
    $CI =& get_instance();
    $CI->load->model("BKPRMI_Model");
    $menu = $CI->BKPRMI_Model->get_menu_by_parent($parent);
    $html = [];
    if(count($menu) > 0){
      for($i=0; $i<count($menu); $i++){
        $html[$i] = (object)[
          'id' => $menu[$i]['id'],
          'parent_id' => $menu[$i]['parent_id'],
          'nama_menu' => $menu[$i]['nama_menu'],
          'slug_menu' => $menu[$i]['slug_menu'],
          'page_type' => $menu[$i]['page_type'],
          'page_url' => $menu[$i]['page_url'],
          'sub' => get_menu($menu[$i]['id'])
        ];
      }
    }
    return $html;
  }
}

if( ! function_exists("show_paging") ){
  function show_paging($url, $limit_per_page, $total_records, $uri_segment){
    $CI =& get_instance();
    // load Pagination library
    $CI->load->library('pagination');

    $paging = '';
    if ($total_records > 0) {
      $config['base_url'] = $url;
      $config['total_rows'] = $total_records;
      $config['per_page'] = $limit_per_page;
      $config["uri_segment"] = $uri_segment;
        
      // custom paging configuration
      $config['num_links'] = 2;
      $config['use_page_numbers'] = TRUE;
      $config['reuse_query_string'] = TRUE;
        
      $config['full_tag_open'] = '<ul class="pagination">';
      $config['full_tag_close'] = '</ul>';
        
      $config['first_link'] = '<i class="icon-forward"></i>';
      $config['first_tag_open'] = '<li class="page-item">';
      $config['first_tag_close'] = '</li>';
        
      $config['last_link'] = '<i class="icon-backward"></i>';
      $config['last_tag_open'] = '<li class="page-item">';
      $config['last_tag_close'] = '</li>';
        
      $config['next_link'] = '<i class="icon-step-forward"></i>';
      $config['next_tag_open'] = '<li class="page-item">';
      $config['next_tag_close'] = '</span>';

      $config['prev_link'] = '<i class="icon-step-backward"></i>';
      $config['prev_tag_open'] = '<li class="page-item">';
      $config['prev_tag_close'] = '</li>';

      $config['cur_tag_open'] = '<li class="page-item active">';
      $config['cur_tag_close'] = '</li>';

      $config['num_tag_open'] = '<li class="page-item">';
      $config['num_tag_close'] = '</li>';
      
      $config['attributes'] = array('class' => 'page-link');

      $CI->pagination->initialize($config);
            
      // build paging links
      $paging = $CI->pagination->create_links();
    }

    return $paging;
  }
}