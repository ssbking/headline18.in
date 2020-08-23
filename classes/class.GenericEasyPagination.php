<?php
/**
* @class 			GenericEasyPagination
* @description		This class is meant to present the records of a database query split between multiple pages
* @autor			Olavo Alexandrino
* @contact  		oalexandrino@yahoo.com.br
* @country  		BRAZIL, RECIFE - PE
* @date				2003,January
* @ps				Class GenericEasyPagination is tested using Class ADODB (http://php.weblogs.com/adodb#downloads)
* @dataBaseTested	MySQL version 3.23.56-nt, Microsoft SQL Server 2000 and Microsoft Access 2002 (using Class ADODB)
*/
class GenericEasyPagination
{
    public $getsVars;
    public $recordByPage;
    public $PagesFound;
    public $totalRecords;
    public $currentPage;
    public $msg_initialPage;
    public $msg_finalPage;
    public $msg_previousPage;
    public $msg_nextPage;
    public $msg_next10Results;
    public $msg_previous10Results;
    public $msg_page;
    public $msg_of;
    public $msg_even;

    /**
    * Setting Language, Current Page and Records by Page
    * Language Default: Brazilian Portuguese
    * @access public
    */
    public function __construct($page, $recordByPage, $language = "default")
    {
        $this->_configCurrentPage($page);
        $this->_setRecordByPage($recordByPage);
        if ($language == "default"):
            $this->msg_initialPage  = "Página Inicial";
        $this->msg_finalPage    = "Página Final";
        $this->msg_previousPage = "Anterior";
        $this->msg_nextPage	    = "Próxima";
        $this->msg_next10Results = "Próximas 10 páginas";
        $this->msg_previous10Results = "10 Páginas anteriores";
        $this->msg_page		    = "Ir para Página";
        $this->msg_of		     = "De";
        $this->msg_to		     = "a"; else:
            $this->msg_initialPage   = "Initial Page";
        $this->msg_finalPage     = "Final Page";
        $this->msg_previousPage  = "Previous";
        $this->msg_nextPage	     = "Next";
        $this->msg_next10Results = "Next 10 Pages";
        $this->msg_previous10Results = "Previous 10 Pages";
        $this->msg_page		     = "Go to Page";
        $this->msg_of		     = "";
        $this->msg_to		     = "to";
        endif;
    }

    /**
    * Setting current page
    * @access 	private
    */
    public function _configCurrentPage($page)
    {
        if (empty($page)):
            $this->currentPage = 1; else:
            $this->currentPage = $page;
        endif;
    }

    /**
    * Setting the records listed in each page
    * @access 	private
    */
    public function _setRecordByPage($recordByPage)
    {
        $this->recordByPage = $recordByPage;
    }

    /**
    * Setting the total number of records retrieved
    * @access 	public
    */
    public function setTotalRecords($totalRecords)
    {
        $this->totalRecords = $totalRecords;
        $this->PagesFound = ceil($this->totalRecords / $this->recordByPage);
    }

    /**
    * Defining the additional parameters that may be necessary on the search and will be passed between pages with the GET method
    * @access 	public
    */
    public function setGetVars($getsVars)
    {
        $this->getsVars = $getsVars;
    }


    /**
    * Outputs the total number of records
    * @access 	public
    */
    public function getTotalRecords()
    {
        return $this->totalRecords;
    }

    /**
    * Outputs the total number of pages
    * @access 	public
    */
    public function getPagesFound()
    {
        return $this->PagesFound;
    }

    /**
    * Outputs the Navigation links
    * @access 	public
    */
    public function getNavigation()
    {
        $result = "";
        $previous = $this->currentPage - 1;
        $next     = $this->currentPage + 1;
        
        if ($this->getsVars ==""):
            if ($this->PagesFound>1):
                if ($this->currentPage!=1):
                    $result .= "<a href='?page=1' title='".$this->msg_initialPage."' onMouseOver=\"window.status='".$this->msg_initialPage."';return true\" onMouseOut=\"window.status='';return true\"><< </a>&nbsp;&nbsp;&nbsp;&nbsp;";
        endif;
        if ($this->currentPage>1):     		$result .= "<a href='?page=".($previous)."' title='".$this->msg_previousPage."' onMouseOver=\"window.status='".$this->msg_previousPage."';return true\" onMouseOut=\"window.status='';return true\">".$this->msg_previousPage."</a>&nbsp;&nbsp;";
        endif;
        if (($this->currentPage < $this->PagesFound) && ($this->PagesFound >= 1)):	$result .= " <a href='?page=".($next)."'  title='".$this->msg_nextPage."' onMouseOver=\"window.status='".$this->msg_nextPage."';return true\" onMouseOut=\"window.status='';return true\">".$this->msg_nextPage."</a>";
        endif;
        if (($this->PagesFound>1)&&($this->currentPage!=$this->PagesFound)):
                    $result .=  "&nbsp;&nbsp;&nbsp;&nbsp;<a href='?page=".$this->PagesFound."'  title='".$this->msg_finalPage."' onMouseOver=\"window.status='".$this->msg_finalPage."';return true\" onMouseOut=\"window.status='';return true\"> >></a>";
        endif;
        endif; else:
            if ($this->currentPage!=1):
                $result = "<a href='?page=1&".$this->getsVars."' title='".$this->msg_initialPage."' onMouseOver=\"window.status='".$this->msg_initialPage."';return true\" onMouseOut=\"window.status='';return true\"><< </a>&nbsp;&nbsp;&nbsp;&nbsp;";
        endif;
        if ($this->currentPage>1):  $result .=  "<a href='?page=".($previous)."&".$this->getsVars."' title='".$this->msg_previousPage."' onMouseOver=\"window.status='".$this->msg_previousPage."';return true\" onMouseOut=\"window.status='';return true\">".$this->msg_previousPage."</a>&nbsp;&nbsp;";
        endif;
        if (($this->currentPage<$this->PagesFound) && ($this->PagesFound>=1)):	$result .= "<a href='?page=".($next)."&".$this->getsVars."'  title='".$this->msg_nextPage."' onMouseOver=\"window.status='".$this->msg_nextPage."';return true\" onMouseOut=\"window.status='';return true\">".$this->msg_nextPage."</a>";
        endif;
        if (($this->PagesFound>1)&&($this->currentPage!=$this->PagesFound)):
                $result .= "&nbsp;&nbsp;&nbsp;&nbsp;<a href='?page=".$this->PagesFound."&".$this->getsVars."'  title='".$this->msg_finalPage."' onMouseOver=\"window.status='".$this->msg_finalPage."';return true\" onMouseOut=\"window.status='';return true\"> >></a>";
        endif;
        endif;
        return $result;
    }

    /**
    * Outputs Navigation records list based in current page
    * @access 	public
    */
    public function getCurrentPages()
    {
        $totalRecordsControl = $this->totalRecords;
        if (($totalRecordsControl%$this->recordByPage!=0)):
            while ($totalRecordsControl%$this->recordByPage!=0):
                $totalRecordsControl++;
        endwhile;
        endif;
        $ultimo = substr($this->currentPage, -1);
        if ($ultimo == 0):
            $begin = ($this->currentPage-9);
        $pageInicial = ($this->currentPage - $ultimo);
        $end = $this->currentPage; else:
            $pageInicial = ($this->currentPage - $ultimo);
        $begin = ($this->currentPage-$ultimo)+1;
        $end = $pageInicial+10;
        endif;
        $num = $this->PagesFound;
        if ($end>$num):
            $end = $num;
        endif;
        for ($a = $begin; $a <= $end ; $a++):
            if ($a!=$this->currentPage):
                if ($this->getsVars ==""):
                    @$result .= " <a href='?page=$a' onMouseOver=\"window.status='".$this->msg_page.": $a';return true\" title='".$this->msg_page.": $a' onMouseOut=\"window.status='';return true\">$a</a>&nbsp;"; else:
                    @$result .= " <a href='?page=$a&".$this->getsVars."' onMouseOver=\"window.status='".$this->msg_page.": $a';return true\" title='".$this->msg_page.": $a' onMouseOut=\"window.status='';return true\">$a</a>&nbsp;";
        endif; else:
                @$result .= " [$a] &nbsp;";
        endif;
        endfor;
        return @$result;
    }

    /**
    * Outputs the records list based in current page
    * @access 	public
    */
    public function getListCurrentRecords()
    {
        $regFinal = $this->recordByPage * $this->currentPage;
        $regInicial = $regFinal - $this->recordByPage;
        if ($regInicial == 0):
            $regInicial++;
        endif;
        if ($this->currentPage == $this->PagesFound):
            $regFinal = $this->totalRecords;
        endif;
        if ($this->currentPage > 1):
            $regInicial++;
        endif;
        $result = $this->msg_of." $regInicial ".$this->msg_to." $regFinal";
        return $result;
    }

    /**
    * Outputs the links for browsing from 1 to 10, 11 to 20, 21 to 30, and so forth
    * @access 	public
    */
    public function getNavigationGroupLinks()
    {
        if (($this->currentPage <= 10) && ($this->PagesFound >= 1)):
                $end = 11; else:
                $last  = substr($this->currentPage, -1);
        $first = substr($this->currentPage, 0, 1);
        if ($last != 0):
                    $aux1  = $first + 1;
        $aux1  = $aux1."0";
        $aux1  = ($aux1 - $this->currentPage)+1;
        $end   = $this->currentPage + $aux1; else:
                    $end  = $this->currentPage + 1;
        endif;
        $begin = $end - 20;
        endif;
        if (!(($this->currentPage>= 1)&&($this->currentPage<=10))):
                $result  = "<a href='?page=".($begin)."&".$this->getsVars."' title='".$this->msg_previous10Results."' onMouseOver=\"window.status='".$this->msg_previous10Results."';return true\" onMouseOut=\"window.status='';return true\">".$this->msg_previous10Results."</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        endif;
        if ($end <= $this->PagesFound):
                $result .= " <a href='?page=".($end)."&".$this->getsVars."'  title='".$this->msg_next10Results."' onMouseOver=\"window.status='".$this->msg_next10Results."';return true\" onMouseOut=\"window.status='';return true\">".$this->msg_next10Results."</a>";
        endif;
        return $result;
    }
}
