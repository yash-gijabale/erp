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

function get_subgroup_by_id($id){
    $CI =& get_instance();
    $res = $CI->Comman_model->get_data_by_id('*','subgroup', array('subgroup_id'=> $id));
    if($res){
        return $res->subgroup_name;
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

    function get_opbservation_status($id)
    {
        $status = array
        (
            '0' => 'Open',
            '1' => 'In progress',
            '2' => 'Close',
        );
        $color = array
        (
            '0' => 'badge-danger',
            '1' => 'badge-warning',
            '2' => 'badge-success',
        );
        $data['status'] = $status[$id];
        $data['color'] = $color[$id];
        return $data;
    }

    function get_role_of_user($id){
        $CI =& get_instance();
        $role = $CI->Comman_model->get_data_by_id('*','roles', array('role_id' => $id));
        if($role){
    
            return $role->role_title;
        }else{
            return '';
        }
    }

    function get_history_table_by_role_id($id)
    {
        $tables = array
        (
            '1' => 'site_enginner_history',
            '2' => 'responsible_history',
            '3' => 'reviewer_history',
            '4' => 'approval_history'
        );

        $table = $tables[$id];
        return $table;
    }

    function get_table_combiniation($id)
    {
        $tables = array
        (
            '1' => array('site_enginner_history', 'reviewer_history'),
            '2' => array('responsible_history', 'site_enginner_history'),
            '3' => array('reviewer_history', 'approval_history')
        );
        $table = $tables[$id];
        return $table;

    }

    function get_table_combiniation_for_reject($id)
    {
        $tables = array
        (
            '1' => array('site_enginner_history', 'responsible_history'),
            '3' => array('reviewer_history', 'site_enginner_history'),
            '4' => array('approval_history', 'reviewer_history')
        );
        $table = $tables[$id];
        return $table;

    }

    function get_username_by_id($id){
        $CI =& get_instance();
        $user = $CI->Comman_model->get_data_by_id('*','users', array('user_id' => $id));
        if($user){
            $name = $user->first_name." ".$user->last_name;
            return $name;
        }else{
            return '';
        }
    }

    function get_inner_obj_status($id)
    {
        $CI =& get_instance();
        $user_type =  $CI->session->userdata('user_data')->user_type;
        $table = get_history_table_by_role_id($user_type);
        $obj = $CI->Comman_model->get_data_by_id('*', $table, array('observation_id'=>$id));
        $status = array
        (
            '0' => 'new',
            '1' => 'Forwarded',
            '2' => 'Rejected',
            '3' => 'Closed'
        );
        $color = array
        (
            '0' => 'badge-primary',
            '1' => 'badge-warning',
            '2' => 'badge-danger',
            '3' => 'badge-success'

        );
        $data['status'] = $status[$obj->inner_status];
        $data['color'] = $color[$obj->inner_status];
        return $data;
    }

    function get_presenty_status($status)
    {
        $status_array = array
        (
            '0' => 'Absent',
            '1' => 'Present',
        );
        return $status_array[$status];
    }

    function get_material_unit($id)
    {
        $CI =& get_instance();
        $unit = $CI->Comman_model->get_data_by_id('*', 'material_measures', array('measure_id'=>$id));
        if($unit)
        {
            return $unit->measure_name;
        }

    }
    function get_material_name($id)
    {
        $CI =& get_instance();
        $unit = $CI->Comman_model->get_data_by_id('*', 'total_material', array('material_id'=>$id));
        if($unit)
        {
            return $unit->material_name;
        }

    }

    function get_sidebar_menu($user_id)
    {
        $CI =& get_instance();
        $moduleRes = $CI->Comman_model->get_data('*', 'permission', array('user_id' => $user_id),$join=false,$orderclm=false, $order=false,$limit=false,$groupby='module_id');
        
        $moduleArr = array();
        foreach($moduleRes as $module)
        {
            array_push($moduleArr, $module->module_id);

        }

        $sideBarMenuArray = array();

        foreach($moduleArr as $moduleId)
        {
            $subArr = array();
            $submoduleRes = $CI->Comman_model->get_data('*', 'permission', array('user_id' => $user_id, 'module_id' => $moduleId, 'submodule_id >' => 0));
            $module = $CI->Comman_model->get_data_by_id('*', 'modules', array('module_id' => $moduleId));
            $subArr['module'] = $module;

            if(!empty($submoduleRes))
            {
                $arr = array();
                foreach($submoduleRes as $submode)
                {
                    $subModule = $CI->Comman_model->get_data_by_id('*', 'submodule', array('submodule_id' => $submode->submodule_id));
                    $arr[] = $subModule;
                }
                $subArr['submodules'] = $arr;
            }else{
                $subArr['submodules'] = array();

            }


            array_push($sideBarMenuArray, $subArr);
        }

        return $sideBarMenuArray;
    }


    function side_menu_for_admin()
    {
        $CI =& get_instance();
        $modules = $CI->Comman_model->get_data('*', 'modules');

        $sideBarMenuArray = array();
        foreach($modules as $module)
        {
            $arr = array();
            $arr['module'] = $module;
            $submodule = $CI->Comman_model->get_data('*', 'submodule', array('module_id' => $module->module_id));
            if($submodule)
            {
                $arr['submodules'] = $submodule;
            }else{
                $arr['submodules'] = array();

            }
            array_push($sideBarMenuArray, $arr);

        }
        return ($sideBarMenuArray);
    }

    function checkHasUerModuleAccees($userId, $moduleId)
    {
        $CI =& get_instance();
        $res = $CI->Comman_model->get_data('*', 'permission', array('user_id' => $userId, 'module_id' => $moduleId));
        if($res)
        {
            return TRUE;
        }else
        {
            return FALSE;
        }
    }

    function checkHasUerSubmoduleAccees($userId, $moduleId, $submoduleId)
    {
        $CI =& get_instance();
        $res = $CI->Comman_model->get_data('*', 'permission', array('user_id' => $userId, 'module_id' => $moduleId, 'submodule_id' => $submoduleId));
        if($res)
        {
            return TRUE;
        }else
        {
            return FALSE;
        }
    }

    function getChecklistGroupName($id)
    {
        $CI =& get_instance();
        $res = $CI->Comman_model->get_data_by_id('*', 'checklist_group', array('checklist_group_id' => $id));
        if($res)
        {
            return $res->checklist_group_name;
        }else{
            return '';

        }
        
    }
?>