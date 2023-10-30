<?php
declare(strict_types=1);

namespace Classes;

class Pager {
    public int $currentPage;
    public int $recordsPerPage;
    public int $totalRecords;

    public function __construct($currentPage = 1, $recordsPerPage = 10, $totalRecords = 0)
    {
        $this->currentPage = (int) $currentPage;
        $this->recordsPerPage = (int) $recordsPerPage;
        $this->totalRecords = (int) $totalRecords;
    }

    public function validate(string $redirect) : void
    {
        if ($this->currentPage < 1 || $this->currentPage > $this->totalPages() && $this->totalRecords !== 0) {
            header("Location: {$redirect}?page=1");
            return;
        }
    }

    public function offset() : int
    {
        return $this->recordsPerPage * ($this->currentPage - 1);
    }

    public function totalPages() : float
    {
        return ceil($this->totalRecords / $this->recordsPerPage);
    }

    public function previousPage() : bool | int
    {
        $previous = $this->currentPage - 1;
        return ($previous > 0) ? $previous : false;
    }
    public function nextPage() : bool | int
    {
        $next = $this->currentPage + 1;
        return ($next <= $this->totalPages()) ? $next : false;
        
    }

    public function previousLink() : string
    {
        $html = '';
        if ($this->previousPage()) {
            $html = "<a class='pager__link' href='?page={$this->previousPage()}'>&laquo; Anterior</a>";
        }

        return $html;
    }

    public function nextLink() : string
    {
        $html = '';
        if ($this->nextPage()) {
            $html = "<a class='pager__link' href='?page={$this->nextPage()}'> Siguiente &raquo; </a>";
        }

        return $html;
    }

    public function numberedPager() : string
    {
        $html = '';
        for ($i = 1; $i <= $this->totalPages(); $i++) {
            if ($i === $this->currentPage) {
                $html .= "<span class=' pager__link pager__link--active' href='?page={$i}'> {$i} </span>";                
            } else {
                $html .= "<a class='pager__link' href='?page={$i}'> {$i} </a>";
            }
        }

        return $html;
    }

    public function pager() : string
    {
        $html = '';
        if($this->totalRecords > $this->recordsPerPage) {
            $html = "<div class='pager'>";
            $html .= $this->previousLink();
            $html .= $this->numberedPager();
            $html .= $this->nextLink();
            $html .= "</div>";
        }

        return $html;
    }
}
