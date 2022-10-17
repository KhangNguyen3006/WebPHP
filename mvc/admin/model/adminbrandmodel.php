<?php 
    class AdminBrandModel extends BrandModel{
        protected $fields=['brandName', 'alias', 'trash', 'status'];
        protected $key='brandId';
    }
?>