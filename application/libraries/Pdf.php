<?php 

Class Pdf{

	protected $ci;

	function __construct()
	{
		$this->ci =& get_instance();
	}

	function print($html, $filename, $paper, $orientation)
	{
		$dompdf = new Dompdf\Dompdf;
		$dompdf->loadHTML($html);
		$dompdf->setPaper($paper, $orientation);
		$dompdf->render();
		$dompdf->stream($filename, array('Attachment' => 0));

	}

}

?>