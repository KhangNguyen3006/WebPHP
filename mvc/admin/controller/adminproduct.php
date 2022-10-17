<?php 
    class AdminProduct extends AdminController{
        public function productList($limit=LIMIT, $offset=0)
        {
            //yêu cầu model thực hiện
            $adminproductmodel=new AdminProductModel;
            $data=$adminproductmodel->productList($limit, $offset);
            //gửi dữ liệu cho view
            $this->loadadminview('adminmaster1', 'adminproduct/productlist', $data);
        }

        public function productListInTrash($limit=LIMIT, $offset=0)
        {
            //yêu cầu model thực hiện
            $adminproductmodel=new AdminProductModel;
            $data=$adminproductmodel->productListInTrash($limit, $offset);
            //gửi dữ liệu cho view
            $this->loadadminview('adminmaster1', 'adminproduct/productlistintrash', $data);
        }

        public function productToggleTrash($productId)
        {
            //yeu cau model thuc hien
            $adminproductmodel=new AdminProductModel;
            $data=$adminproductmodel->toggleTrash($productId);
        }

        public function productToggleStatus($productId){
            $adminproductmodel= new AdminProductModel;
            $data= $adminproductmodel->toggleStatus($productId);
        }

        public function addproduct()
        {
            //xử lí dữ liệu nhận được
            if(isset($_POST['submit']))
            {
                $adminproductmodel= new AdminProductModel;
                $adminproductmodel->doAddProduct();
            }

            //hiển thị form Addproduct
            $catmodel=new AdminCategoryModel;
            $data['cats']=$catmodel->getAll(['trash'=>0, 'status'=>1]);
            $brandmodel=new AdminBrandModel;
            $data['brands']=$brandmodel->getAll(['trash'=>0, 'status'=>1]);
            $this->loadAdminView('adminmaster1','adminproduct/addproduct', $data);
        }

        public function UpdateProduct($productId)
        {
            //xử lí dữ liệu nhận được
            $adminproductmodel= new AdminProductModel;
            if(isset($_POST['submit']))
            {
                $adminproductmodel->doUpdateProduct($productId);
            }

            $adminproductmodel= new AdminProductModel;
             //hiển thị form Updateproduct
             $catmodel=new AdminCategoryModel;
             $data['cats']=$catmodel->getAll(['trash'=>0, 'status'=>1]);
             $brandmodel=new AdminBrandModel;
             $data['brands']=$brandmodel->getAll(['trash'=>0, 'status'=>1]);
             $data['oldproduct']=$adminproductmodel->get(['productId'=>$productId]);
             $this->loadAdminView('adminmaster1','adminproduct/updateproduct', $data);
        }
    }
?>