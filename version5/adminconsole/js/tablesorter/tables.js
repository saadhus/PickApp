//$(function() {
/*
	// **********************************
  //  Description of ALL pager options
  // **********************************
  var pagerOptions = {

    // target the pager markup - see the HTML block below
    container: $(".pager"),

    // use this url format "http:/mydatabase.com?page={page}&size={size}&{sortList:col}"
    ajaxUrl: null,

    // modify the url after all processing has been applied
    customAjaxUrl: function(table, url) { return url; },

    // process ajax so that the data object is returned along with the total number of rows
    // example: { "data" : [{ "ID": 1, "Name": "Foo", "Last": "Bar" }], "total_rows" : 100 }
    ajaxProcessing: function(ajax){
      if (ajax && ajax.hasOwnProperty('data')) {
        // return [ "data", "total_rows" ];
        return [ ajax.total_rows, ajax.data ];
      }
    },

    // output string - default is '{page}/{totalPages}'
    // possible variables: {page}, {totalPages}, {filteredPages}, {startRow}, {endRow}, {filteredRows} and {totalRows}
    output: '{startRow} - {endRow} / {filteredRows} ({totalRows})',

    // apply disabled classname to the pager arrows when the rows at either extreme is visible - default is true
    updateArrows: true,

    // starting page of the pager (zero based index)
    page: 0,

    // Number of visible rows - default is 10
    size: 10,

    // Save pager page & size if the storage script is loaded (requires $.tablesorter.storage in jquery.tablesorter.widgets.js)
    savePages : true,
    
    //defines custom storage key
    storageKey:'tablesorter-pager',

    // if true, the table will remain the same height no matter how many records are displayed. The space is made up by an empty
    // table row set to a height to compensate; default is false
    fixedHeight: true,

    // remove rows from the table to speed up the sort of large tables.
    // setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
    removeRows: false,

    // css class names of pager arrows
    cssNext: '.next', // next page arrow
    cssPrev: '.prev', // previous page arrow
    cssFirst: '.first', // go to first page arrow
    cssLast: '.last', // go to last page arrow
    cssGoto: '.gotoPage', // select dropdown to allow choosing a page

    cssPageDisplay: '.pagedisplay', // location of where the "output" is displayed
    cssPageSize: '.pagesize', // page size selector - select dropdown that sets the "size" option

    // class added to arrows when at the extremes (i.e. prev/first arrows are "disabled" when on the first page)
    cssDisabled: 'disabled', // Note there is no period "." in front of this class name
    cssErrorRow: 'tablesorter-errorRow' // ajax error information row

  };

  $("table.tablesorter").tablesorter({debug: true,

    // initialize zebra striping and filter widgets
    widgets: ["filter"],

    // headers: { 5: { sorter: false, filter: false } },

    widgetOptions : {

      // If there are child rows in the table (rows with class name from "cssChildRow" option)
      // and this option is true and a match is found anywhere in the child row, then it will make that row
      // visible; default is false
      filter_childRows : true,

      // if true, a filter will be added to the top of each table column;
      // disabled by using -> headers: { 1: { filter: false } } OR add class="filter-false"
      // if you set this to false, make sure you perform a search using the second method below
      filter_columnFilters : true,

      // extra css class applied to the table row containing the filters & the inputs within that row
      filter_cssFilter : '',

      // class added to filtered rows (rows that are not showing); needed by pager plugin
      filter_filteredRow   : 'filtered',

      // add custom filter elements to the filter row
      // see the filter formatter demos for more specifics
      filter_formatter : null,

      // add custom filter functions using this option
      // see the filter widget custom demo for more specifics on how to use this option
      filter_functions : null,

      // if true, filters are collapsed initially, but can be revealed by hovering over the grey bar immediately
      // below the header row. Additionally, tabbing through the document will open the filter row when an input gets focus
      filter_hideFilters : false,

      // Set this option to false to make the searches case sensitive
      filter_ignoreCase : true,

      // if true, search column content while the user types (with a delay)
      filter_liveSearch : true,

      // jQuery selector string of an element used to reset the filters
      filter_reset : 'button.reset',

      // Use the $.tablesorter.storage utility to save the most recent filters (default setting is false)
      filter_saveFilters : true,

      // Delay in milliseconds before the filter widget starts searching; This option prevents searching for
      // every character while typing and should make searching large tables faster.
      filter_searchDelay : 300,

      // if true, server-side filtering should be performed because client-side filtering will be disabled, but
      // the ui and events will still be used.
      filter_serversideFiltering: false,

      // Set this option to true to use the filter to find text from the start of the column
      // So typing in "a" will find "albert" but not "frank", both have a's; default is false
      filter_startsWith : false,

      // Filter using parsed content for ALL columns
      // be careful on using this on date columns as the date is parsed and stored as time in seconds
      filter_useParsedData : false

    }

  }).tablesorterPager(pagerOptions);
 */
 $(function(){

	// define pager options
	var pagerOptions = {
		// target the pager markup - see the HTML block below
		container: $(".pager"),
		// output string - default is '{page}/{totalPages}'; possible variables: {page}, {totalPages}, {startRow}, {endRow} and {totalRows}
		output: '{startRow} - {endRow} / {filteredRows} ({totalRows})',
		// if true, the table will remain the same height no matter how many records are displayed. The space is made up by an empty
		// table row set to a height to compensate; default is false
		fixedHeight: true,
		// remove rows from the table to speed up the sort of large tables.
		// setting this to false, only hides the non-visible rows; needed if you plan to add/remove rows with the pager enabled.
		removeRows: false,
		// go to page selector - select dropdown that sets the current page
		cssGoto:	 '.gotoPage'
	};

	// Initialize tablesorter
	// ***********************
	$("table")
		.tablesorter({
			theme: 'blue',
			headerTemplate : '{content} {icon}', // new in v2.7. Needed to add the bootstrap icon!
			widthFixed: true,
			widgets: ['zebra', 'filter'],
			widgetOptions: {
				filter_reset: 'button.reset'
			}
		})

		// initialize the pager plugin
		// ****************************
		.tablesorterPager(pagerOptions);
		
		// Delete a row
		// *************
		$('table').delegate('button.remove', 'click' ,function(){
			var t = $('table');
			// disabling the pager will restore all table rows
			// t.trigger('disable.pager');
			// remove chosen row
			$(this).closest('tr').remove();
			// restore pager
			// t.trigger('enable.pager');
			t.trigger('update');
			return false;
		});
		
  // External search
  // buttons set up like this:
  // <button type="button" data-filter-column="4" data-filter-text="2?%">Saved Search</button>
  $('button[data-filter-column]').click(function(){
    /*** first method *** data-filter-column="1" data-filter-text="!son"
      add search value to Discount column (zero based index) input */
    var filters = [],
      $t = $(this),
      col = $t.data('filter-column'), // zero-based index
      txt = $t.data('filter-text') || $t.text(); // text to add to filter

    filters[col] = txt;
    // using "table.hasFilters" here to make sure we aren't targetting a sticky header
    $.tablesorter.setFilters( $('table.hasFilters'), filters, true ); // new v2.9

    /** old method (prior to tablsorter v2.9 ***
    var filters = $('table.tablesorter').find('input.tablesorter-filter');
    filters.val(''); // clear all filters
    filters.eq(col).val(txt).trigger('search', false);
    ******/

    /*** second method ***
      this method bypasses the filter inputs, so the "filter_columnFilters"
      option can be set to false (no column filters showing)
    ******/
    /*
    var columns = [];
    columns[5] = '2?%'; // or define the array this way [ '', '', '', '', '', '2?%' ]
    $('table').trigger('search', [ columns ]);
    */

    return false;
  });
});
