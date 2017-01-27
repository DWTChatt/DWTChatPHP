<?php
class Ajax
{
    public $ajaxRequests = array(), $returnedData = ' ';
    public function createAjaxRequest($name, $json, $func = ''){
        $this->ajaxRequests[$name] = array(
            'value' => $json,
            'func' => $func
        );
        return $this;
    }
    public function useAjaxRequest($name){
        $data = "$.ajax({". $this->ajaxRequests[$name]['value'] . "})" . $this->ajaxRequests[$name]['func'];
        return $data;
    }
}