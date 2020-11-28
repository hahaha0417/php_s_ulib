<?php

/*
 * 原始 : hahaha
 * 維護 : 
 * 指揮 : 
 * ---------------------------------------------------------------------------- 
 * 決定 : name
 * ----------------------------------------------------------------------------
 * 說明 : 
 * ----------------------------------------------------------------------------   
    
 * ----------------------------------------------------------------------------

*/ 

namespace s_ulib\tool\text_deal;
 
/*

*/
class hahaha_script_main
{
    use \hahahalib\hahaha_instance_trait;
    
    public $Ip_;
    public $Port_;
	
    //-----------------------------------------------------------
    public function Initial()
    {
        $this->Ip_ = "127.0.0.1";
        $this->Port_ = "9000";

        return $this;
    }

    public function Initial_Setting(&$ip, &$port)
    {
        $this->Ip_ = &$ip;
        $this->Port_ = &$port;

        return $this;
    }

    //-----------------------------------------------------------
    public function Send_Origin(&$content)
    {
        $command_ = "send";
        $method_ = "origin";

        // 快速接口
        // 有空整入hahalib
        $upd_client_ = \hahahalib\hahaha_socket_udp_client::instance();
        $upd_client_->Create();
        $upd_client_->Connect($_POST['ip'], $_POST['port']);

        // ---------------------------------
        $length_ = strlen($command_);
        $upd_client_->Send($upd_client_->Socket_, $command_, $length_);
        // ---------------------------------

        // ---------------------------------
        $length_ = strlen($method_);
        $upd_client_->Send($upd_client_->Socket_, $method_, $length_);
        // ---------------------------------

        // ---------------------------------
        $length_ = strlen($content);
        $upd_client_->Send($upd_client_->Socket_, $content, $length_);
        // ---------------------------------

        $upd_client_->Close();
    }

  

}