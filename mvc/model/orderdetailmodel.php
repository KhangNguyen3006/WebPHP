<?php
class OrderDetailModel extends BaseModel{
    protected $table=DB_PREFIX.'orderdetail';
    protected $field=['orderId','productId','price','quantity','trash' ];
    protected $key='orderDetailId';
}
?>