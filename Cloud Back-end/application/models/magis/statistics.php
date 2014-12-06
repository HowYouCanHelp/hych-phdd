<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * main public functions:
 * add($table, $view, $options);
 * edit($id, $table, $view, $options);
 */

class Statistics extends CI_Model {
	
	public function descriptive_statistics($array) {
		  $n = 0;
		  $mean = 0;
		  $M2 = 0;
		  $sum = 0;
		  $min = PHP_INT_MAX;
		  $max = $min*(-1);
		  
		  foreach($array as $x){
			  ++$n;
			  $sum += $sum;
			  $delta = $x - $mean;
			  $mean = $mean + $delta/$n;
			  $M2 = $M2 + $delta*($x - $mean);
			  if($x < $min) {
				$min = $x;
			  }
			  if($x > $max) {
				$max = $x;
			  }
		  }
		  $variance = ($n > 1) ? $M2/($n - 1) : 0;
		  $stdev = sqrt($variance);
		  return array('count' => $n,
						'sum' => $sum,
						'min' => $min,
						'max' => $max,
						'mean' => $mean,
						'variance' => $variance,
						'standard_deviation' => $stdev);
	}
}
