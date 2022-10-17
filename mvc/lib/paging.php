<?php class Paging{
    public $limit;
    public $offset;
    public $basepath;
    public $totalRecords;
    public $totalPages;
    public $currentPage;
    function __construct($basepath, $totalRecords, $limit, $offset){
        $this->basepath= $basepath;
        $this->totalRecords= $totalRecords;
        $this->limit=$limit;
        $this->offset=$offset;
        $this->totalPages=ceil($this->totalRecords/$this->limit);
        $this->currentPage=ceil(($this->offset+1)/$this->limit);
    }
    function createLinks(){
        $htmltext='<nav>';
        $htmltext.='<ul class="pagination">';
        if ($this->currentPage!=1){
            $htmltext.='<li class="page-item"> <a class="page-link" href=" '.BASE_URL.$this->basepath.$this->limit.'/0'.'"> First </a> </li>';
            $htmltext.='<li class="page-item"> <a class="page-link" href=" '.BASE_URL.$this->basepath.$this->limit.'/'.($this->currentPage-2)*$this->limit.'"> Previous </a> </li>';

        }
        for ($i=1; $i<=$this->totalPages; $i++){
            if($i==$this->currentPage)
            $htmltext.='<li class="page-item"><a class="page-link text-danger" href="'.BASE_URL.$this->basepath.$this->limit.'/'.($i-1)*$this->limit.'">'.$i.'</a></li>';
        else
            $htmltext.='<li class="page-item"><a class="page-link" href="'.BASE_URL.$this->basepath.$this->limit.'/'.($i-1)*$this->limit.'">'.$i.'</a></li>';
        }
        if($this->currentPage !=$this->totalPages){
            $htmltext.='<li class="page-item"> <a class="page-link" href="'.BASE_URL.$this->basepath.$this->limit.'/'.($this->currentPage+1)*$this->limit.'"> Next </a></li>';
            $htmltext.='<li class="page-item"> <a class="page-link" href="'.BASE_URL.$this->basepath.$this->limit.'/'.($this->currentPage-1)*$this->limit.'"> Last </a></li>';

        }
        $htmltext.='</ul>';
        $htmltext.='</nav>';
        echo $htmltext;
    }
}
?>