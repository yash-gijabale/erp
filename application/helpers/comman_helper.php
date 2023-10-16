<?php

function get_developer_by_id($id){
	$CI =& get_instance();
    $res = $CI->Comman_model->get_data_by_id('*','developer', array('developer_id'=> $id));
    if($res){

        return $res->developer_name;
    }else{
        return '';
    }

}

function get_projectname_by_id($id){
    $CI =& get_instance();
    $res = $CI->Comman_model->get_data_by_id('*','project', array('project_id'=> $id));
    if($res){
        return $res->project_name;
    }else{
        return '';
    }
}

function structurename_by_id($id){
    $CI =& get_instance();
    $res = $CI->Comman_model->get_data_by_id('*','structure', array('structure_id'=> $id));
    if($res){
        return $res->structure_name;
    }else{
        return '';
    }
}

function get_trade_by_id($id){
    $CI =& get_instance();
    $res = $CI->Comman_model->get_data_by_id('*','trade', array('trade_id'=> $id));
    if($res){
        return $res->trade_name;
    }else{
        return '';
    }
}

function get_tradegroup_by_id($id){
    $CI =& get_instance();
    $res = $CI->Comman_model->get_data_by_id('*','trade_gruop', array('tradegroup_id'=> $id));
    if($res){
        return $res->tradegroup_name;
    }else{
        return '';
    }
}

function get_project_type($type_id){
    $CI =& get_instance();
    $type = array(
        '1' => 'Residential',
        '2' => 'Commercial',
        '3' => 'Infra',
    );
    return $type[$type_id];
}

function get_floors_by_structure_id($id){
    $CI =& get_instance();
    $structure_id = $id;
        if($structure_id){
            $structure = $CI->Comman_model->get_data('*','stages',array('structure_id'=>$structure_id));
            return $structure;
        }
}

function get_all_types(){
    $CI =& get_instance();
        $types = $CI->Comman_model->get_data('*','observation_type');
        return $types;
    }

function get_all_severity(){
        $CI =& get_instance();
            $severity = $CI->Comman_model->get_data('*','observation_severity');
            return $severity;
    }

function get_all_roles(){
    $CI =& get_instance();
        $roles = $CI->Comman_model->get_data('*','roles');
        return $roles;
    }

    function get_role_name_by_role_id($id){
        $CI =& get_instance();
        $res = $CI->Comman_model->get_data_by_id('*','roles', array('role_id'=> $id));
        if($res){
    
            return $res->role_title;
        }else{
            return '';
        }
    }

    function get_all_developers(){
        $CI =& get_instance();
        $develoers = $CI->Comman_model->get_data('*','developer');
        return $develoers;
    }

?>