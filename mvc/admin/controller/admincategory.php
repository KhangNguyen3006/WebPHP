<?php 
    class AdminCategory extends AdminController{
        public function catList($limit=LIMIT, $offset=0)
        {
            //yêu cầu model thực hiện
            $admincategorymodel=new AdminCategoryModel;
            $data=$admincategorymodel->catList($limit, $offset);
            //gửi dữ liệu cho view
            $this->loadadminview('adminmaster1', 'admincategory/catlist', $data);
        }

        public function catListInTrash($limit=LIMIT, $offset=0)
        {
            //yêu cầu model thực hiện
            $admincategorymodel=new AdminCategoryModel;
            $data=$admincategorymodel->catListInTrash($limit, $offset);
            //gửi dữ liệu cho view
            $this->loadadminview('adminmaster1', 'admincategory/catlistintrash', $data);
        }

        public function catToggleTrash($catId)
        {
            //yeu cau model thuc hien
            $admincategorymodel=new AdminCategoryModel;
            $data=$admincategorymodel->toggleTrash($catId);
        }

        public function catToggleStatus($catId){
            $admincategorymodel= new AdminCategoryModel;
            $data= $admincategorymodel->toggleStatus($catId);
        }

        public function addcat()
        {
            //xử lí dữ liệu nhận được
            if(isset($_POST['submit']))
            {
                $admincategorymodel= new AdminCategoryModel;
                $admincategorymodel->doAddCat();
            }

            //hiển thị form Addcat
            $categorymodel=new AdminCategoryModel;
            $data['cats']=$categorymodel->getAll(['trash'=>0, 'status'=>1]);
            $this->loadAdminView('adminmaster1','admincategory/addcat', $data);
        }

        public function UpdateCat($catId)
        {
            //xử lí dữ liệu nhận được
            $admincategorymodel= new AdminCategoryModel;
            if(isset($_POST['submit']))
            {
                $admincategorymodel->doUpdateCat($catId);
            }

            $admincategorymodel= new AdminCategoryModel;
             //hiển thị form Updatecat
             $categorymodel=new AdminCategoryModel;
             $data['cats']=$categorymodel->getAll(['trash'=>0, 'status'=>1]);
             $data['oldcat']=$admincategorymodel->get(['catId'=>$catId]);
             $this->loadAdminView('adminmaster1','admincategory/updatecat', $data);
        }
    }
?>