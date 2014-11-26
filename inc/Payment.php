<?php
    class Payment {
	
	public $id;
	public $creditCard;
	public $amount;
	public $timeDate;
	
	public static function CreatePayment( $creditCard, $amount ) {
	    $instance = new self();
	    $time = new DateTime( 'now' );
	    $instance->id = PaymentDao::GetInstance()->createPayment( $creditCard->cardNumber, $amount , $time );
	    $instance->amount = $amount;
	    $instance->creditCard = $creditCard;
	    $instance->timeDate = $time;
	    return $instance;
	}
    }

?>
