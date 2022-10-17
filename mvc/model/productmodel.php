<?php 
    class ProductModel extends BaseModel
    {
        protected $table=DB_PREFIX.'product';
        public function home($limit, $offset)
        {
            $sql="select * from ".$this->table." where trash='0' and status='1' and salePrice<>'' limit $offset, $limit";
            $data['products']=$this->queryAll($sql);
            $sql="select * from ".$this->table." where trash='0' and status='1' and salePrice<>''";
            $totalRecords=count($this->queryAll($sql));
            $data['paging']=new Paging('product/home/', $totalRecords, $limit, $offset);
            return $data;
        }

        public function productByCat($catAlias, $limit, $offset){
            $catmodel=new CategoryModel;
            $cat=$catmodel->get(['alias'=>$catAlias]);
            $data['cat']=$cat;
            $data['products']= $this->getAllLimit(['trash'=>0, 'status'=>1, 'catId'=>$cat['catId']], $limit, $offset);
            $totalRecords=count($this->getAll(['trash'=>0, 'status'=>1, 'catId'=>$cat['catId']]));
            $data['paging']=new Paging('product/productByCat/'.$catAlias.'/', $totalRecords, $limit, $offset);
            return $data;
        }

        public function productByBrand($brandAlias, $limit, $offset){
            $brandmodel=new BrandModel;
            $brand=$brandmodel->get(['alias'=>$brandAlias]);
            $data['brand']=$brand;
            $data['products']= $this->getAllLimit(['trash'=>0, 'status'=>1, 'brandId'=>$brand['brandId']], $limit, $offset);
            $totalRecords=count($this->getAll(['trash'=>0, 'status'=>1, 'brandId'=>$brand['brandId']]));
            $data['paging']=new Paging('product/productByBrand/'.$brandAlias.'/', $totalRecords, $limit, $offset);
            return $data;
        }

        public function productDetail($productAlias)
        {
            $data['currentproduct']=$this->get(['alias'=>$productAlias]);
            $data['sameProducts']=$this->getAll(['trash'=>0, 'status'=>1, 'catId'=>$data['currentproduct']['catId']]);
            return $data;
        }

        public function productSearch($searchKey, $limit, $offset)
        {
            $sql="select * from $this->table where trash='0' and status='1' and productName like '%$searchKey%' limit $offset, $limit";
            $data['products']= $this->queryAll($sql);
            $sql="select * from $this->table where trash='0' and status='1' and productName like '%$searchKey%'";
            $totalRecords=count($this->queryAll($sql));
            $data['totalRecords']=$totalRecords;
            $data['paging']=new Paging('product/productSearch/', $totalRecords, $limit, $offset);
            return $data;
        }
    
    }
?>