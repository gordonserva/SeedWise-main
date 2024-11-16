<script type="text/javascript">
	var _url = "{{ url('') }}";
	var _admin_url = "{{ url('admin') }}";
	var _media_url = "{{ isset($parent_id) ? url('media/get_table_data/'.$parent_id) : url('media/get_table_data') }}";
	var _date_format = "{{ get_option('date_format','Y-m-d') }}";
	var _backend_direction = "{{ get_option('backend_direction','ltr') }}";
	var _currency = "{{ currency(get_base_currency()) }}";
	var _base_currency_id = "{{ base_currency_id() }}";

	var $lang_alert_title = "{{ _lang('Are you sure?') }}";
	var $lang_alert_message = "{{ _lang('Once deleted, you will not be able to recover this information !') }}";
	var $lang_confirm_button_text = "{{ _lang('Yes, delete it!') }}";
	var $lang_cancel_button_text = "{{ _lang('Cancel') }}";
    var $lang_no_data_found = "{{ _lang('No Data Found') }}";
	var $lang_showing = "{{ _lang('Showing') }}";
	var $lang_to = "{{ _lang('to') }}";
	var $lang_of = "{{ _lang('of') }}";
	var $lang_entries = "{{ _lang('Entries') }}";
	var $lang_showing_0_to_0_of_0_entries = "{{ _lang('Showing 0 To 0 Of 0 Entries') }}";
	var $lang_show = "{{ _lang('Show') }}";
	var $lang_loading = "{{ _lang('Loading...') }}";
	var $lang_processing = "{{ _lang('Processing...') }}";
	var $lang_search = "{{ _lang('Search') }}";
	var $lang_no_matching_records_found = "{{ _lang('No matching records found') }}";
	var $lang_first = "{{ _lang('First') }}";
	var $lang_last = "{{ _lang('Last') }}";
	var $lang_next = "{{ _lang('Next') }}";
	var $lang_previous = "{{ _lang('Previous') }}";
	var $lang_copy = "{{ _lang('Copy') }}";
	var $lang_excel = "{{ _lang('Excel') }}";
	var $lang_pdf = "{{ _lang('PDF') }}";
	var $lang_print = "{{ _lang('Print') }}";
	var $lang_add_new = "{{ _lang('Add New') }}";
	var $lang_select_one = "{{ _lang('Select One') }}";
	var $lang_expense_overview = "{{ _lang('Expense Overview') }}";
	var $lang_deposit = "{{ _lang('Deposit') }}";
	var $lang_withdraw = "{{ _lang('Withdraw') }}";
</script>