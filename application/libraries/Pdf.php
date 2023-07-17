<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/vendor/tecnickcom/tcpdf/config/tcpdf_config.php';
class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
}
/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */
