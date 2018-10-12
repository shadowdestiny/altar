<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Pagination Class
 *
 * @package   CodeIgniter
 * @link      http://codeigniter.com/user_guide/libraries/pagination.html
 *
 * Modified by @author Ricardo Daniel Carrada Peña <rdcarrada@gmail.com>
 */
class Ajax_pagination
{

    var $link_func = 'getData';
    var $base_url = ''; // The page we are linking to
    var $total_rows = ''; // Total number of items (database results)
    var $auctionId = '';
    var $per_page = 10; // Max number of items you want shown per page
    var $num_links = 10; // Number of "digit" links to show before/after the currently viewed page
    var $cur_page = 0; // The current page being viewed
    var $uri_segment = 0;

    /*
     * div pagination
     */
    var $full_tag_open = '<ul class="pagination">';
    var $full_tag_close = '</ul>';
    var $first_link = '&laquo; First';
    var $first_tag_open = '<li class="prev page">';
    var $first_tag_close = '</li>';
    var $last_link = 'Last &raquo;';
    var $last_tag_open = '<li class="next page">';
    var $last_tag_close = '</li>';
    //var $cur_tag_open    = '<li><a onclick="getData(0)" id="paginateLink">';

    var $next_link = 'Next &rarr;';
    var $next_tag_open = '<li class="next page">';
    var $next_tag_close = '</li>';
    var $prev_link = '&larr; Previous';
    var $prev_tag_open = '<li class="prev page">';
    var $prev_tag_close = '</li>';
    var $cur_tag_open = '<li class="active"><a href="">';
    var $cur_tag_close = '</a><li>';
    var $num_tag_open = '<li class="page">';
    var $num_tag_close = '</li>';
    var $target = '';
    var $anchor_class = 'follow_link';
    var $show_count = false;
    var $loading = '.loading';

    /**
     * Constructor
     * @access    public
     * @param    array    initialization parameters
     */
    function CI_Pagination($params = array())
    {
        if (count($params) > 0) {
            $this->initialize($params);
        }
        log_message('debug', "Pagination Class Initialized");
    }

    function setCur_tag_open($var1)
    {
        $this->cur_tag_open = $var1;
    }

    /**
     * Initialize Preferences
     * @access    public
     * @param    array    initialization parameters
     * @return    void
     */
    function initialize($params = array())
    {

        if (count($params) > 0) {
            foreach ($params as $key => $val) {
                if (isset($this->$key)) {
                    $this->$key = $val;
                }
            }
        }
        //var_dump('urisegment- AjaxPagination' . $this->uri_segment);
        // Apply class tag using anchor_class variable, if set.
        if ($this->anchor_class != '') {
            $this->anchor_class = 'class="' . $this->anchor_class . '" ';
        }
    }

    /**
     * Generate the pagination links
     * @access    public
     * @return    string
     */
    function create_links($typeAuctionId = NULL)
    {
        // If our item count or per-page total is zero there is no need to continue.
        if ($this->total_rows == 0 OR $this->per_page == 0) {
            return '';
        }
        $this->auctionId = $typeAuctionId;

        // Calculate the total number of pages
        $num_pages = ceil($this->total_rows / $this->per_page);

        // Is there only one page? Hm... nothing more to do here then.
        /*if ($num_pages == 1) {
            $info = '<ul class="pagination margin-medium-top"><li class="prev page">Mostrando : ' . $this->total_rows;
            return $info;
        }*/


        if ($num_pages == 1) {

            $pagination = '
            <nav aria-label="Page navigation">
              <ul class="pagination top-buttom">
                <li>
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true"> < </span>
                  </a>
                </li>
                <li class="selected"><a href="#" >1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>            
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true"> >> </span>
                  </a>
                </li>
              </ul>
            </nav>
            ';

            //$info = '<ul class="pagination margin-medium-top"><li class="prev page">Mostrando : ' . $this->total_rows;

            return $pagination;
        }

        // Determine the current page number.
        $CI = &get_instance();
        if ($CI->uri->segment($this->uri_segment) != 0) {
            $this->cur_page = $CI->uri->segment($this->uri_segment);
            // Prep the current page - no funny business!
            $this->cur_page = (int)$this->cur_page;
        }

        $this->num_links = (int)$this->num_links;
        if ($this->num_links < 1) {
            show_error('Your number of links must be a positive number.');
        }

        if (!is_numeric($this->cur_page)) {
            $this->cur_page = 0;
        }

        // Is the page number beyond the result range?
        // If so we show the last page
        if ($this->cur_page > $this->total_rows) {
            $this->cur_page = ($num_pages - 1) * $this->per_page;
        }

        $uri_page_number = $this->cur_page;
        $this->cur_page = floor(($this->cur_page / $this->per_page) + 1);

        // Calculate the start and end numbers. These determine
        // which number to start and end the digit links with
        $start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
        $end = (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;

        // Add a trailing slash to the base URL if needed
        $this->base_url = rtrim($this->base_url, '/') . '/';

        // And here we go...
        $output = '';

        // SHOWING LINKS
        if ($this->show_count) {
            $curr_offset = $CI->uri->segment($this->uri_segment);
            $info = 'Showing ' . ($curr_offset + 1) . ' to ';

            if (($curr_offset + $this->per_page) < ($this->total_rows - 1))
                $info .= $curr_offset + $this->per_page;
            else
                $info .= $this->total_rows;

            $info .= ' of ' . $this->total_rows . ' | ';
            $output .= $info;
        }

        // Render the "First" link
        if ($this->cur_page > $this->num_links) {
            $output .= $this->first_tag_open
                . $this->getAJAXlink('', $this->first_link)
                . $this->first_tag_close;
        }

        // Render the "previous" link
        if ($this->cur_page != 1) {
            $i = $uri_page_number - $this->per_page;
            if ($i == 0)
                $i = '';
            $output .= $this->prev_tag_open
                . $this->getAJAXlink($i, $this->prev_link)
                . $this->prev_tag_close;
        }

        // Write the digit links
        for ($loop = $start - 1; $loop <= $end; $loop++) {
            $i = ($loop * $this->per_page) - $this->per_page;
            if ($i >= 0) {
                if ($this->cur_page == $loop) {
                    $output .= $this->cur_tag_open . $loop . $this->cur_tag_close; // Current page
                } else {
                    $n = ($i == 0) ? '' : $i;
                    $output .= $this->num_tag_open
                        . $this->getAJAXlink($n, $loop)
                        . $this->num_tag_close;
                }
            }
        }

        // Render the "next" link
        if ($this->cur_page < $num_pages) {
            $output .= $this->next_tag_open
                . $this->getAJAXlink($this->cur_page * $this->per_page, $this->next_link)
                . $this->next_tag_close;
        }

        // Render the "Last" link
        if (($this->cur_page + $this->num_links) < $num_pages) {
            $i = (($num_pages * $this->per_page) - $this->per_page);
            $output .= $this->last_tag_open . $this->getAJAXlink($i, $this->last_link) . $this->last_tag_close;
        }

        // Kill double slashes.  Note: Sometimes we can end up with a double slash
        // in the penultimate link so we'll kill all double slashes.
        $output = preg_replace("#([^:])//+#", "\\1/", $output);

        // Add the wrapper HTML if exists
        $output = $this->full_tag_open . $output . $this->full_tag_close;
        ?>
        <script>


            function getData(count, category_id) {
                console.log("entro get Data: " + count);

                data = {
                    page: count,
                    videoCategory: category_id,
                    typefilter: 0
                };
                $.ajax({
                    type: "post",
                    url: "<?php echo $this->base_url; ?>",
                    cache: false,
                    data: data,

                    success: function (datos) {
                        $('#postList').html('');
                        $('#postList').html(datos);
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        console.log("Error");
                    }
                });
            }

        </script>
        <?php
        return $output;
    }

    function getAJAXlink($count, $text)
    {
        $pageCount = $count ? $count : 0;

        return '<li><a ' . $this->anchor_class . '  onclick="' . $this->link_func . '(' . $pageCount . ')">' . $text . '</a></li>';
    }

}

// END Pagination Class